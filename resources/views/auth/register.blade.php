@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <div class="container text-center">
                                        <img src="{{ asset('img/logo.png') }}" alt="Logo JobTime" class="text-center"
                                            width="100px" />
                                    </div>
                                    <h5 class="card-title text-center pb-0 fs-4">Daftar</h5>
                                </div>
                                <form action="{{ route('register') }}" class="row g-3 needs-validation" novalidate
                                    method="POST"> @csrf
                                    <div class="col-12">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="name" required
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username"
                                            class="form-control @error('username') is-invalid @enderror" id="username"
                                            required value="{{ old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            required value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="password_confirmation" class="form-label">Konfirmasi
                                            Password</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="password_confirmation" required>
                                    </div>

                                    <div class="col-12">
                                        <label for="phone_number" class="form-label">Nomor HP</label>
                                        <input type="text" name="phone_number" class="form-control" id="phone_number"
                                            required value="{{ old('phone_number') }}">
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Daftar</button>
                                    </div>

                                    <div class="col-12 text-center">
                                        <p class="small mb-0">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
                                        </p>
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
