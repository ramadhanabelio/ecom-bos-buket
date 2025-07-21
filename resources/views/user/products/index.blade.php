@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Daftar Produk</h2>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('user.products.show', $product->id) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ $product->name }}</h5>
                            <p class="card-text mb-1">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('user.products.show', $product->id) }}" class="btn btn-sm btn-pink">
                                        Beli Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
