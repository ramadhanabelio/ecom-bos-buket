<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Product;
use App\Models\BankAccount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('user.products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('user.products.show', compact('product'));
    }

    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('user.products.checkout', compact('product'));
    }

    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $request->validate([
            'qty' => 'required|integer|min:1',
            'date_order' => 'required|date',
            'other_address' => 'nullable|string',
            'notes' => 'nullable|string',
            'payment_method' => 'required|string',
        ]);

        $total = $product->price * $request->qty;

        $order = Order::create([
            'invoice' => 'INV-' . strtoupper(Str::random(8)),
            'user_id' => Auth::id(),
            'id_product' => $product->id,
            'date_order' => $request->date_order,
            'other_address' => $request->other_address,
            'notes' => $request->notes,
            'payment_method' => $request->payment_method,
            'qty' => $request->qty,
            'total' => $total,
            'status' => 'pending',
        ]);

        return redirect()->route('user.payment', $order->invoice);
    }

    public function payment($invoice)
    {
        $order = Order::where('invoice', $invoice)->firstOrFail();
        $banks = BankAccount::all();

        return view('user.products.payment', compact('order', 'banks'));
    }

    public function confirmPayment(Request $request, $invoice)
    {
        $order = Order::where('invoice', $invoice)->firstOrFail();

        $request->validate([
            'payer_name' => 'required|string',
            'bank_name' => 'required|string',
            'account_number' => 'required|string',
            'proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $proofPath = $request->file('proof')->store('proofs', 'public');

        $order->update([
            'status' => 'paid',
            'notes' => $order->notes . "\nPembayaran dari {$request->payer_name} via {$request->bank_name} ({$request->account_number})",
            'payment_proof' => $proofPath,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

    public function history()
    {
        $orders = Order::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.products.history', compact('orders'));
    }
}
