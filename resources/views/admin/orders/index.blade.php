@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Pesanan</h1>
        <nav class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Daftar Pesanan</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Pesanan</h5>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Invoice</th>
                                    <th>Nama Produk</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}.</td>
                                        <td>{{ $order->invoice }}</td>
                                        <td>{{ $order->product->name ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->date_order)->format('d M Y') }}</td>
                                        <td>Rp. {{ number_format($order->total, 0, ',', '.') }}</td>
                                        <td>
                                            @php
                                                $statusClass = match ($order->status) {
                                                    'pending' => 'bg-warning',
                                                    'paid' => 'bg-info',
                                                    'shipped' => 'bg-primary',
                                                    'delivered' => 'bg-success',
                                                    'canceled' => 'bg-danger',
                                                    default => 'bg-secondary',
                                                };
                                            @endphp
                                            <span class="badge {{ $statusClass }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                                class="badge bg-info text-dark">Detail</a>
                                            <a href="{{ route('admin.orders.edit', $order->id) }}"
                                                class="badge bg-warning text-dark">Edit</a>
                                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="badge bg-danger border-0 text-white"
                                                    onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
