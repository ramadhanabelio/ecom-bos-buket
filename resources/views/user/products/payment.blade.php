@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h4>Pembayaran</h4>

        <div class="row">
            {{-- Data Rekening --}}
            <div class="col-md-6">
                <div class="border p-3 rounded">
                    <h5>Data No Rekening</h5>
                    <p>Silakan lakukan pembayaran dengan nominal:</p>
                    <h4>Rp.{{ number_format($order->total, 0, ',', '.') }}</h4>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Bank</th>
                                <th>No Rekening</th>
                                <th>Atas Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banks as $bank)
                                <tr>
                                    <td>{{ $bank->bank_name }}</td>
                                    <td>{{ $bank->account_number }}</td>
                                    <td>{{ $bank->account_holder_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Form Upload --}}
            <div class="col-md-6">
                <div class="border p-3 rounded">
                    <h5>Upload Bukti Pembayaran</h5>
                    <form action="{{ route('user.payment.confirm', $order->invoice) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label>Atas Nama</label>
                            <input type="text" name="payer_name" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label>Nama Bank</label>
                            <input type="text" name="bank_name" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label>No Rek</label>
                            <input type="text" name="account_number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Bukti Bayar</label>
                            <input type="file" name="proof" class="form-control" accept="image/*" required>
                        </div>
                        <button class="btn btn-success">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
