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
                        <form action="{{ route('admin.orders.index') }}" method="GET" class="row g-3 mb-3">
                            <div class="col-md-4">
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ request('start_date') }}">
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="end_date" class="form-control"
                                    value="{{ request('end_date') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Reset</a>
                            </div>
                            <div class="col-md-2 text-end">
                                <a href="{{ route('admin.orders.export.pdf', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}"
                                    class="btn btn-danger">
                                    <i class="bi bi-filetype-pdf"></i> Cetak PDF
                                </a>
                            </div>
                        </form>
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor Invoice</th>
                                    <th>Nama Produk</th>
                                    <th>Tanggal Order</th>
                                    <th>Tanggal Pengambilan</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Bukti Transfer</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}.</td>
                                        <td>{{ $order->invoice }}</td>
                                        <td>{{ $order->product->name ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->date_order)->format('d M Y') }}</td>
                                        <td>Rp. {{ number_format($order->total, 0, ',', '.') }}</td>
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
                                                    'pending' => 'Diproses',
                                                    'paid' => 'Dibayar',
                                                    'shipped' => 'Dikirim',
                                                    'delivered' => 'Diterima',
                                                    'canceled' => 'Dibatalkan',
                                                ];

                                                $label = $statusLabels[$order->status] ?? ucfirst($order->status);
                                            @endphp

                                            <span class="badge bg-{{ $badge }}">
                                                {{ $label }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($order->payment_proof)
                                                <a href="#" class="badge bg-success text-white" data-bs-toggle="modal"
                                                    data-bs-target="#proofModal{{ $order->id }}">
                                                    Lihat Bukti
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="proofModal{{ $order->id }}" tabindex="-1"
                                                    aria-labelledby="proofModalLabel{{ $order->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="proofModalLabel{{ $order->id }}">Bukti Transfer
                                                                    - {{ $order->invoice }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{ asset('storage/' . $order->payment_proof) }}"
                                                                    alt="Bukti Transfer"
                                                                    class="img-fluid rounded shadow-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="badge bg-secondary">Belum Ada</span>
                                            @endif
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
