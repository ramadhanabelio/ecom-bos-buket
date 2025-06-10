@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <div class="container text-center">
                                        <img src="{{ asset('img/logo.png') }}" alt="Logo JobTime" class="text-center"
                                            width="100px" />
                                    </div>
                                    <h5 class="card-title text-center pb-0 fs-4">Masuk</h5>
                                </div>
                                <form action="{{ route('login') }}" class="row g-3 needs-validation" novalidate
                                    method="POST"> @csrf
                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="yourEmail"
                                            required value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="yourPassword"
                                            required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Masuk</button>
                                    </div>
                                    <div class="col-12 text-center">
                                        <p class="small mb-0">Belum mempunyai akun? <a
                                                href="{{ route('register') }}">Daftar</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
