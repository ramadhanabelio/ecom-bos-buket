@extends('layouts.app')

@section('title', 'Riwayat Pemesanan')

@section('content')
    <div class="container py-4">
        <h4>Riwayat Pembelian</h4>

        @if ($orders->isEmpty())
            <p class="text-muted">Belum ada pesanan yang dibuat.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Produk</th>
                        <th>Tanggal</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Bukti Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->invoice }}</td>
                            <td>{{ $order->product->name ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->date_order)->format('d M Y') }}</td>
                            <td>{{ $order->qty }}</td>
                            <td>Rp.{{ number_format($order->total, 0, ',', '.') }}</td>
                            <td>
                                @php
                                    $badge = match ($order->status) {
                                        'pending' => 'secondary',
                                        'paid' => 'info',
                                        'shipped' => 'warning',
                                        'delivered' => 'success',
                                        'canceled' => 'danger',
                                        default => 'dark',
                                    };

                                    $statusLabels = [
                                        'pending' => 'Menunggu',
                                        'paid' => 'Dibayar',
                                        'shipped' => 'Dikirim',
                                        'delivered' => 'Diterima',
                                        'canceled' => 'Dibatalkan',
                                    ];

                                    $statusText = $statusLabels[$order->status] ?? ucfirst($order->status);
                                @endphp
                                <span class="badge bg-{{ $badge }}">{{ $statusText }}</span>
                            </td>
                            <td>
                                @if ($order->payment_proof)
                                    <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        Lihat
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
