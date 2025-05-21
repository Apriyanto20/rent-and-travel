<!DOCTYPE html>
<html>
<head>
    <title>Laporan Rental</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h3>Laporan Transaksi Rental</h3>
    <p>Periode: {{ $rentalStartDate }} s/d {{ $rentalEndDate }}</p>

    <table>
        <thead>
            <tr>
                <th>WAKTU TRANSAKSI</th>
                <th>MEMBER</th>
                <th>TRANSPORTASI</th>
                <th>MERK</th>
                <th>MODEL</th>
                <th>TANGGAL</th>
                <th>METODE PEMBAYARAN</th>
                <th>STATUS PEMBAYARAN</th>
                <th>STATUS RENTAL</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->member->name ?? '-' }}</td>
                <td>{{ $item->transportationRental->transportation->transportation ?? '-', }}</td>
                <td>{{ $item->transportationRental->merk->merk ?? '-' }}</td>
                <td>{{ $item->transportationRental->model ?? '-' }}</td>
                <td>{{ $item->rentalStartDate . ' s/d ' . $item->rentalEndDate }}</td>
                <td>{{ $item->paymentMethod }}</td>
                <td>{{ $item->paymentStatus }}</td>
                <td>{{ $item->rentalStatus }}</td>
                <td>{{ number_format($item->rentalCost) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
