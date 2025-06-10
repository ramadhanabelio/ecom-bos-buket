@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
    <div class="pagetitle">
        <h1>Detail Pesanan</h1>
        <nav class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.orders.index') }}">Daftar Pesanan</a>
                </li>
                <li class="breadcrumb-item active">Detail Pesanan</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Pesanan</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>Nomor Invoice</th>
                                <td>{{ $order->invoice }}</td>
                            </tr>
                            <tr>
                                <th>Nama Produk</th>
                                <td>{{ $order->product->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pesan</th>
                                <td>{{ \Carbon\Carbon::parse($order->date_order)->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>{{ $order->qty }}</td>
                            </tr>
                            <tr>
                                <th>Total Harga</th>
                                <td>Rp. {{ number_format($order->total, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @php
                                        $statusClass = match ($order->status) {
                                            'pending' => 'text-bg-warning',
                                            'paid' => 'text-bg-info',
                                            'shipped' => 'text-bg-primary',
                                            'delivered' => 'text-bg-success',
                                            'canceled' => 'text-bg-danger',
                                            default => 'text-bg-secondary',
                                        };
                                    @endphp
                                    <span class="badge {{ $statusClass }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Alamat Tambahan</th>
                                <td>{{ $order->other_address ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Catatan</th>
                                <td>{{ $order->notes ?? '-' }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
