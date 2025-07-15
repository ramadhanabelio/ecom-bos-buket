@extends('layouts.app')

@section('content')
    <div class="container p-4 bg-white rounded shadow-sm">
        <h4 class="mb-4">Checkout: {{ $product->name }}</h4>

        {{-- Ringkasan Barang --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $product->name }}</td>
                    <td>Rp.{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>Rp.{{ number_format($product->price, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        {{-- Form Checkout --}}
        <form action="{{ route('user.checkout.store', $product->id) }}" method="POST">
            @csrf

            <div class="row">
                {{-- Kolom kiri --}}
                <div class="col-md-8">
                    <div class="mb-2">
                        <label>Nama Penerima</label>
                        <input type="text" name="recipient_name" class="form-control" required>
                    </div>

                    <div class="mb-2">
                        <label>Alamat</label>
                        <textarea name="other_address" class="form-control" required></textarea>
                    </div>

                    <div class="mb-2">
                        <label>No. HP Penerima</label>
                        <input type="text" name="phone_number" class="form-control" required>
                    </div>

                    <div class="mb-2">
                        <label>Input bahan yang disediakan pelanggan</label>
                        <input type="text" name="customer_material" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label>Metode Pembayaran</label>
                        <select name="payment_method" class="form-control" required>
                            <option value="Transfer Bank">Transfer Bank</option>
                            <option value="COD">Bayar di Tempat</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label>Tanggal Pengambilan</label>
                        <input type="date" name="date_order" class="form-control" required>
                    </div>

                    <div class="mb-2">
                        <label>Opsi Tambahan</label>
                        <select name="extra_option" class="form-control">
                            <option value="Kartu Ucapan">Tambah Kartu Ucapan</option>
                            <option value="Tidak Ada">Tidak Ada</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Input isi kartu ucapan</label>
                        <textarea name="notes" class="form-control"></textarea>
                    </div>
                </div>

                {{-- Kolom kanan --}}
                <div class="col-md-4">
                    <div class="border p-3 rounded bg-light">
                        <h5>Total Bayar:</h5>
                        <h4 class="text-success">Rp.{{ number_format($product->price, 0, ',', '.') }}</h4>
                        <input type="hidden" name="qty" value="1">
                        <button type="submit" class="btn btn-success w-100 mt-3">Check Out</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
