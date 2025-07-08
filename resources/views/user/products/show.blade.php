@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p class="text-muted">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                <p>{{ $product->description }}</p>
                <p><strong>Ukuran:</strong> {{ $product->size }}</p>
                <p><strong>Status:</strong> {{ $product->status }}</p>

                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary">
                        <i class="bi bi-cart-plus"></i>
                    </button>
                    <button class="btn btn-pink">Beli Sekarang</button>
                </div>
            </div>
        </div>
    </div>
@endsection
