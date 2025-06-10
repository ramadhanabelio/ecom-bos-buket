@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Master Data</a>
                </li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xxl-4 col-md-6">
                        <a href="{{ route('admin.orders.index') }}" class="text-decoration-none">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Manajemen Pesanan</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-receipt"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalOrders }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Manajemen Produk</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-box"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalProducts }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <a href="{{ route('admin.categories.index') }}" class="text-decoration-none">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Manajemen Kategori</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-grid"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalCategories }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xxl-4 col-md-6">
                        <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Manajemen Pelanggan</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalUsers }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
