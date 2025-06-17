@extends('layouts.app')

@section('title', 'Edit Rekening')

@section('content')
    <div class="pagetitle">
        <h1>Edit Rekening</h1>
        <nav class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.bank-accounts.index') }}">Daftar Rekening</a>
                </li>
                <li class="breadcrumb-item active">Edit Rekening</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Rekening</h5>
                        <form action="{{ route('admin.bank-accounts.update', $bankAccount->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="bank_name" class="form-label">Nama Bank</label>
                                <input type="text" name="bank_name" id="bank_name"
                                    class="form-control @error('bank_name') is-invalid @enderror"
                                    value="{{ old('bank_name', $bankAccount->bank_name) }}" required>
                                @error('bank_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="account_number" class="form-label">Nama Bank</label>
                                <input type="text" name="account_number" id="account_number"
                                    class="form-control @error('account_number') is-invalid @enderror"
                                    value="{{ old('account_number', $bankAccount->account_number) }}" required>
                                @error('account_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="account_holder_name" class="form-label">Nama Bank</label>
                                <input type="text" name="account_holder_name" id="account_holder_name"
                                    class="form-control @error('account_holder_name') is-invalid @enderror"
                                    value="{{ old('account_holder_name', $bankAccount->account_holder_name) }}" required>
                                @error('account_holder_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.bank-accounts.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
