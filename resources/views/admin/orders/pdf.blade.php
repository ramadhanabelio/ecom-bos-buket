<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: left;
            margin: 0;
            padding: 20px;
        }

        .header {
            position: relative;
            margin-bottom: 25px;
            height: 80px;
        }

        .header img {
            position: absolute;
            left: 0;
            top: 0;
            width: 50px;
        }

        .header .title {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: max-content;
        }

        .header h2 {
            margin: 5px 0;
            font-size: 22px;
        }

        .header p {
            margin: 0;
            font-size: 14px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            font-size: 13px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px 10px;
            vertical-align: top;
        }

        th {
            background-color: #f4f4f4;
            text-align: center;
        }

        td.center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('img/logo.png') }}" alt="Logo">
        <div class="title">
            <h2>Laporan Penjualan</h2>
            <p>Per Tanggal: {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nomor Invoice</th>
                <th>Nama Produk</th>
                <th>Tanggal Order</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $index => $order)
                <tr>
                    <td class="center">{{ $index + 1 }}.</td>
                    <td>{{ $order->invoice }}</td>
                    <td>{{ $order->product->name ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->date_order)->translatedFormat('d F Y') }}</td>
                    <td>Rp. {{ number_format($order->total, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
