<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Mini Bootstrap-like styling for dompdf */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h2,
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        thead {
            background-color: #f2f2f2;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }

        th {
            text-align: center;
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 10px;
            border-radius: 8px;
            color: #fff;
        }

        .status-belum-bayar {
            background-color: #dc3545;
        }

        .status-dibayar {
            background-color: #28a745;
        }

        .status-dikirim {
            background-color: #17a2b8;
        }

        .status-selesai {
            background-color: #6f42c1;
        }
    </style>
</head>

<body>
    <h2>Laporan Penjualan</h2>
    <h3>
        {{ getNamaBulan($bulanIni) }} {{ $tahunIni }}
    </h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Invoice</th>
                <th>Tanggal</th>
                <th>Nama Pembeli</th>
                <th>Produk</th>
                <th>Kuantitas</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Total Produk</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $totalPendapatan = 0;
                $totalKuantitas = 0;
            @endphp

            @foreach ($orders as $order)
                @foreach ($order->orderProduks as $produk)
                    @php
                        $total = $produk->kuantitas * $produk->produk->harga;
                        $totalPendapatan += $total;
                        $totalKuantitas += $produk->kuantitas;
                    @endphp
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $order->invoice }}</td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td>{{ $order->alamat->user->nama }}</td>
                        <td>{{ $produk->produk->nama }}</td>
                        <td class="text-center">{{ $produk->kuantitas }}</td>
                        <td class="text-right">{{ format_rp($produk->produk->harga) }}</td>
                        <td class="text-center">
                            {{ toTitleCase($order->status) }}
                        </td>
                        <td class="text-right">{{ format_rp($total) }}</td>
                    </tr>
                @endforeach
            @endforeach
            <tr>
                <td colspan="5" class="text-center"><strong>Jumlah</strong></td>
                <td class="text-center"><strong>{{ $totalKuantitas }}</strong></td>
                <td colspan="3" class="text-right"><strong>{{ format_rp($totalPendapatan) }}</strong></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
