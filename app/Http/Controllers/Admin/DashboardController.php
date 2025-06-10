<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalUsers = User::where('role', 'user')->count();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalProducts',
            'totalCategories',
            'totalUsers',
        ));
    }
}
