@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="pagetitle">
        <h1>Edit Profile</h1>
        <nav class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('user.profiles') }}">Profile</a>
                </li>
                <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Profile</h5>
                        <form action="{{ route('user.profiles.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    value="{{ old('username', $user->username) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Nomor HP</label>
                                <input type="text" name="phone_number" class="form-control" id="phone_number"
                                    value="{{ old('phone_number', $user->phone_number) }}">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" name="address" class="form-control" id="address"
                                    value="{{ old('address', $user->address) }}">
                            </div>

                            <div class="mb-3">
                                <label for="profile" class="form-label">Profile</label>
                                <input type="file" name="profile" class="form-control" id="profile">
                                @if ($user->profile)
                                    <small class="d-block mt-2">
                                        Profile:
                                        <a href="{{ asset('storage/' . $user->profile) }}" target="_blank">Lihat</a>
                                    </small>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
