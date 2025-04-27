<!DOCTYPE html>
<html>
<head>
    <title>Rangkuman Inovasi - Kota Makassar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        h1, h2 {
            color: #333;
            font-weight: bold;
        }
        h1 {
            font-size: 20px;
            margin-bottom: 4px;
            text-align: center;
        }
        h2 {
            font-size: 18px;
            margin-bottom: 28px;
            text-align: center;
        }
        h3 {
            font-size: 16px;
            margin-bottom: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #FFC0CB; 
            font-weight: bold;
        }
        .no-data {
            font-style: italic;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Total Inovasi Daerah Kota Makassar</h1>

    <h3>Daftar OPD</h2>
    <table>
        <thead>
            <tr>
                <th>Nama OPD</th>
                <th>Jumlah Inovasi</th>
                <th>Nama Inovasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allOpds as $opd)
                <tr>
                    <td>{{ $opd->nama_opd }}</td>
                    <td>{{ $opd->jumlah_inovasi }}</td>
                    <td>
                        @if (!empty($opd->nama_inovasi) && $opd->inovasis->isNotEmpty())
                            {{ $opd->inovasis->pluck('nama_inovasi')->join(', ') }}
                        @else
                            <span class="no-data">Belum ada inovasi</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Daftar UPTD</h2>
    <table>
        <thead>
            <tr>
                <th>Nama UPTD</th>
                <th>Jumlah Inovasi</th>
                <th>Nama Inovasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allUptds as $uptd)
                <tr>
                    <td>{{ $uptd->nama_uptd }}</td>
                    <td>{{ $uptd->jumlah_inovasi }}</td>
                    <td>
                        @if ($uptd->inovasis->isNotEmpty())
                            {{ $uptd->inovasis->pluck('nama_inovasi')->join(', ') }}
                        @else
                            <span class="no-data">Belum ada inovasi</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
