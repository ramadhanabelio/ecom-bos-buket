@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Produk</h1>
        <nav class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Daftar Produk</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Action</h6>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.products.create') }}"><i
                                                class="bi bi-plus"></i> Tambah Produk</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Daftar Produk</h5>
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
                                            <th>Nama Produk</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $index => $product)
                                            <tr>
                                                <td>{{ $index + 1 }}.</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->category->name ?? '-' }}</td>
                                                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                                <td>
                                                    @php
                                                        $statusClass = match ($product->status) {
                                                            'active' => 'bg-success',
                                                            'inactive' => 'bg-secondary',
                                                            'discontinued' => 'bg-danger',
                                                            default => 'bg-light text-dark',
                                                        };
                                                    @endphp
                                                    <span
                                                        class="badge {{ $statusClass }}">{{ ucfirst($product->status) }}</span>
                                                </td>
                                                <td>
                                                    {{-- <a href="{{ route('admin.products.show', $product->id) }}"
                                                        class="badge bg-info text-dark">Detail</a> --}}
                                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                                        class="badge bg-warning text-dark">Edit</a>
                                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                        method="POST" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="badge bg-danger text-white border-0"
                                                            onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
