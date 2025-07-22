@extends('layouts.app')

@section('title', 'Pesanan Diproses')

@section('content')
    <div class="container py-5 text-center">
        <h3 class="mb-3">Pesanan Anda Sedang Diproses</h3>
        <p>Terima kasih telah memesan. Silakan tunggu konfirmasi dari admin.</p>
        <a href="{{ route('user.orders.history') }}" class="btn btn-primary mt-3">Lihat Riwayat Pesanan</a>
    </div>
@endsection
