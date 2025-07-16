<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $invoice_number }}</title>
    <style>
        @page {
            margin: 0px;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
            background-color: #f5e9d7;
            position: relative;
        }

            .watermark {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .watermark span {
        position: absolute;
        font-size: 20px;
        color: #666;
        opacity: 0.12;
        transform: rotate(-30deg);
        font-weight: bold;
        white-space: nowrap;
    }

        .content {
            position: relative;
            z-index: 1;
             padding: 30px 40px;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            height: 60px;
        }

        hr {
            border: none;
            border-top: 1px solid #aaa;
            margin: 20px 0;
        }
.section {
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px dashed #999;
}


        .section h3 {
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #fdf7ef;
        }

        .total {
            margin-top: 15px;
            font-size: 16px;
            font-weight: bold;
            text-align: right;
        }

        .footer {
            text-align: center;
            font-size: 10px;
            margin-top: 40px;
            color: #666;
        }
    </style>
</head>
<body>

    <!-- Watermark grid -->
<div class="watermark">
    @for ($y = 0; $y < 1000; $y += 80)
        @for ($x = 0; $x < 800; $x += 120)
            <span style="top: {{ $y }}px; left: {{ $x }}px;">mylodies</span>
        @endfor
    @endfor
</div>


    <div class="content">

        <!-- Logo -->
        <div class="header">
            <img src="{{ public_path('images/intrologo.png') }}" alt="Logo">
        </div>

        <hr>

        <!-- Info Invoice -->
        <div class="section">
            <h3>Informasi Invoice</h3>
            <p><strong>Nomor Invoice:</strong> {{ $invoice_number }}</p>
            <p><strong>Tanggal Dibuat:</strong> {{ now()->format('d M Y') }}</p>
            <p><strong>Waktu Pembayaran:</strong> {{ $midtrans['transaction_time'] }}</p>
            <p><strong>Waktu Settlement:</strong> {{ $midtrans['settlement_time'] }}</p>
        </div>



        <!-- Info Customer -->
        <div class="section">
            <h3>Informasi Pelanggan</h3>
            <p><strong>Nama:</strong> {{ $order->user->name }}</p>
            <p><strong>Email:</strong> {{ $order->user->email }}</p>
            <p><strong>Alamat Shipping:</strong> {{ $order->shipping_address }}</p>
        </div>

                <!-- Info Transaksi -->
        <div class="section">
            <h3>Informasi Transaksi</h3>
            <p><strong>Order ID (Midtrans):</strong> {{ $midtrans['order_id'] }}</p>
            <p><strong>Transaction ID:</strong> {{ $midtrans['transaction_id'] }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ strtoupper($midtrans['payment_type']) }}</p>
            @if($midtrans['payment_type'] === 'bank_transfer')
                <p><strong>Bank:</strong> {{ strtoupper($midtrans['bank']) }}</p>
                <p><strong>VA Number:</strong> {{ $midtrans['va_number'] }}</p>
            @endif
           
        </div>

        <!-- Tabel Produk -->
@php
    $subtotal = 0;
@endphp

<table>
    <thead>
        <tr>
            <th>Produk</th>
            <th>Qty</th>
            <th>Harga / Hari</th>
            <th>Lama Sewa</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->orderItems as $item)
            @php
                $days = \Carbon\Carbon::parse($item->start_date)->diffInDays(\Carbon\Carbon::parse($item->end_date)) + 1;
                $price = $item->price * $days;
                $rowSubtotal = $item->quantity * $price;
                $subtotal += $rowSubtotal;
            @endphp
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp {{ number_format($item->price) }}</td>
                <td>{{ $days }} hari</td>
                <td>Rp {{ number_format($rowSubtotal) }}</td>
            </tr>
        @endforeach

        <!-- Ringkasan setelah produk -->
        <tr>
            <td colspan="4" style="text-align: right;"><strong>Subtotal Produk</strong></td>
            <td><strong>Rp {{ number_format($subtotal) }}</strong></td>
        </tr>

        <!-- Biaya layanan jika ada (bisa disesuaikan) -->
        <tr>
            <td colspan="4" style="text-align: right;">Biaya Layanan</td>
            <td>Rp 0</td>
        </tr>

        <!-- Diskon -->
        @php
            $gross = $midtrans['gross_amount'];
            $diskon = $subtotal - $gross;
        @endphp

        @if($diskon > 0)
        <tr>
            <td colspan="4" style="text-align: right;">Diskon</td>
            <td style="color: #a94442;">- Rp {{ number_format($diskon) }}</td>
        </tr>
        @endif

        <!-- Total akhir -->
        <tr>
            <td colspan="4" style="text-align: right;"><strong>Total Dibayar</strong></td>
            <td><strong>Rp {{ number_format($gross) }}</strong></td>
        </tr>
    </tbody>
</table>



        <div class="footer">
            &copy; {{ date('Y') }} Mylodies. Invoice ini dihasilkan secara otomatis oleh sistem.
        </div>
    </div>
</body>
</html>
