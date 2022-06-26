<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5d6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 18cm;
            height: 25.7cm;
            margin: 0 auto;
            color: #001028;
            background: #ffffff;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 200px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            border-top: 1px solid #5d6975;
            border-bottom: 1px solid #5d6975;
            color: #5d6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url('img/dimension.png');
        }

        #project {
            float: left;
        }

        #project span {
            color: #5d6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #f5f5f5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5d6975;
            border-bottom: 1px solid #c1ced9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5d6975;
        }

        #notices .notice {
            color: #5d6975;
            font-size: 1.2em;
        }

        footer {
            color: #5d6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #c1ced9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ public_path('img/logoo.png') }}" alt="" width="250px">
        </div>
        <h1 style="margin-top:2em ;">Pesanan ke-{{ $orderDetails -> order_id }}</h1>
        <div id="company" class="clearfix">
            <div>GO Rent</div>
            <div>Jl. Pahlawan No.10, Kec.Blimbing,<br /> Kota Malang, Jawa Timur 65126</div>
            <div>0341-1234567</div>
            <div>GoRent@gmail.com</div>
        </div>
        <div id="project">
            <div><span>PROJECT</span> Penyewaan {{ $orderDetails -> kendaraan -> category -> nama }}</div>
            <div><span>CLIENT</span> {{ $orderDetails -> order -> user -> name }}</div>
            <div><span>ADDRESS</span> {{ $orderDetails -> order -> user -> address }}</div>
            <div><span>EMAIL</span> {{ $orderDetails -> order -> user -> email }}</div>
            <div><span>PHONE</span> {{ $orderDetails -> order -> user -> phone }}</div>
        </div>
    </header>
    <main>
        <h5>Laporan Penyewaan {{ $orderDetails -> kendaraan -> category -> nama }}</h5>
        <table>
            <tbody>
                <tr>
                    <td class="service">Kendaraan</td>

                    <td class="unit">{{ $orderDetails -> kendaraan -> nama }}</td>
                </tr>
                <tr>
                    <td class="service">Merk</td>

                    <td class="unit">{{ $orderDetails -> kendaraan -> brand -> nama }}</td>
                </tr>
                <tr>
                    <td class="service">Tipe</td>

                    <td class="unit">{{ $orderDetails -> kendaraan -> type -> nama }}</td>
                </tr>
                <tr>
                    <td class="service">Warna</td>

                    <td class="unit">{{ $orderDetails -> kendaraan -> warna }}</td>
                </tr>
                <tr>
                    <td class="service">Tahun</td>

                    <td class="unit">{{ $orderDetails -> kendaraan -> tahun }}</td>
                </tr>
                <tr>
                    <td class="service">Tanggal Sewa</td>

                    <td class="unit">{{ $orderDetails -> tanggal_sewa }}</td>
                </tr>
                <tr>
                    <td class="service">Durasi</td>

                    <td class="unit">{{ $orderDetails -> lama_sewa }} hari</td>
                </tr>
                <tr>
                    <td class="service">Total Bayar</td>

                    <td>Rp. {{ number_format($orderDetails -> total_bayar) }}</td>
                </tr>
                <tr>
                    <td class="service">Opsi</td>

                    <td>
                        @if($orderDetails -> opsi == 1)
                        Tanpa Sopir
                        @elseif($orderDetails -> opsi == 2)
                        Dengan Sopir
                        @else
                        Dengan Supir dan BBM
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="service">Catatan Sewa</td>

                    <td class="unit">{{ $orderDetails -> catatan }}</td>
                </tr>
                <tr>
                    <td class="service">Status Pesanan</td>

                    <td>
                        @if ($orderDetails -> order -> status == 1)
                        Dalam Peminjaman
                        @elseif ($orderDetails -> order -> status == 2)
                        Selesai
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="service">Pembayaran</td>

                    <td class="unit">{{ $orderDetails -> order -> bank -> name }}</td>
                </tr>
            </tbody>
        </table>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">Ketika melakukan pengembalian kendaraan mohon bawa surat peminjaman ini.</div>
        </div>
    </main>
    <footer>
        Persewaan Motor dan Mobil GO Rent.
    </footer>
</body>

</html>