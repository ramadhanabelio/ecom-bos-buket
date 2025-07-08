@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('user.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('img/default.png') }}"
                            alt="Profile" class="rounded-circle" style="width: 150px; height: 128px; object-fit: cover;">
                        <h2>{{ $user->name ?? '-' }}</h2>
                        <h3>{{ $user->email ?? '-' }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->name ?? 'No Full Name' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Username</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->username ?? 'No Username' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->email ?? 'No Email' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor HP</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->phone_number ?? 'No Phone Number' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->address ?? 'No Address' }}</div>
                                </div>

                                <div class="text-end mt-4">
                                    <a href="{{ route('user.profiles.edit') }}" class="btn btn-primary">
                                        Edit Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
