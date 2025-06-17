@extends('layouts.app')

@section('title', 'Daftar Rekening')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Rekening</h1>
        <nav class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Daftar Rekening</li>
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
                                        <a class="dropdown-item" href="{{ route('admin.bank-accounts.create') }}"><i
                                                class="bi bi-plus"></i> Tambah Rekening</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Daftar Rekening</h5>
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
                                            <th>Nama Bank</th>
                                            <th>Nomor Rekening</th>
                                            <th>Nama Pemilik</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bankAccounts as $index => $bankAccount)
                                            <tr>
                                                <td>{{ $index + 1 }}.</td>
                                                <td>{{ $bankAccount->bank_name }}</td>
                                                <td>{{ $bankAccount->account_number }}</td>
                                                <td>{{ $bankAccount->account_holder_name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.bank-accounts.edit', $bankAccount->id) }}"
                                                        class="badge bg-warning text-dark">Edit</a>
                                                    <form
                                                        action="{{ route('admin.bank-accounts.destroy', $bankAccount->id) }}"
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
                                {{ $bankAccounts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
