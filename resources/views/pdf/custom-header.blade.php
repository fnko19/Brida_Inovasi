<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Inovasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 0px;
        }
        .header img {
            margin: 0;
            height: 100px;
        }
        .content {
            margin-top: 20px;
        }
        .content p {
            margin: 5px 0;
        }
        .header h2 {
            margin-bottom: 5px;
        }
        .header h3 {
            margin-top: 40px;
            margin-bottom: 5px; 
        }
        .header h5 {
            margin-top: 0; 
            margin-bottom: 0;
        }
        
        ul {
            list-style-type: none;
            padding-left: 20px;
            margin-bottom: 5px;
        }
        ul li {
            margin-bottom: 5px; 
        }
        
        p > strong {
            display: block;
            margin-bottom: 0.15cm;
        }
        
        p + p {
            margin-top: 0cm;
        }

        p > strong + p {
            margin-top: 0.5cm;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/kemenag-logo.png') }}" alt="Logo">
        <h5>KEMENTERIAN DALAM NEGERI</h5>
        <h5>BADAN STRATEGI KEBIJAKAN DALAM NEGERI</h5>
        <h3>LAPORAN INOVASI DAERAH</h3>
    </div>

    <div class="content">
        <p><strong>Pemerintah Daerah:</strong> Kota Makassar</p>
        <p><strong>Nomor Registrasi:</strong> {{ $nomor_registrasi}}</p>

        <h3>1. PROFIL INOVASI</h3>
        <p><strong>1.1. Nama Inovasi:</strong></p>
        <p>{{ $nama_inovasi }}</p>

        <p><strong>1.2. Dibuat Oleh:</strong></p>
        <p>{{ $dibuat_oleh }}</p>

        <p><strong>1.3. Tahapan Inovasi:</strong></p>
        <p>{{ $tahapan_inovasi }}</p>

        <p><strong>1.4. Inisiator:</strong></p>
        <p>{{ $inisiator }}</p>

        <p><strong>1.5. Nama Inisiator:</strong></p>
        <p>{{ $nama_inisiator }}</p>

        <p><strong>1.6. Jenis Inovasi:</strong></p>
        <p>{{ $jenis_inovasi }}</p>

        <p><strong>1.7. Bentuk Inovasi:</strong></p>
        <p>{{ $bentuk_inovasi }}</p>

        <p><strong>1.8. Tematik:</strong></p>
        <p>{{ $tematik }}</p>

        <p><strong>1.9. Prioritas:</strong></p>
        <p>{{ $prioritas }}</p>

        <p><strong>1.10. Misi Beririsan:</strong></p>
        <p>{{ $misi }}</p>

        <p><strong>1.11. Urusan Utama:</strong></p>
        <p>{{ $urusan_utama }}</p>

        <!-- <p><strong>1.12. Urusan Beririsan:</strong></p>
        <p>{{ implode(', ', $urusan_irisan) }}</p> -->

        <p><strong>1.12. Waktu Uji:</strong></p>
        <p>{{ $waktu_uji }}</p>

        <p><strong>1.13. Waktu Penerapan:</strong></p>
        <p>{{ $waktu_penerapan }}</p>

        <p><strong>1.14. Apakah Sudah Berkembang?:</strong></p>
        <p>{{ $berkembang }}</p>

        <p><strong>1.15. Rancang Bangun:</strong></p>
        <ul>
            <li><strong>1.15.1. Dasar Hukum:</strong><p>{{ $dasar_hukum }}</p></li>
            <li><strong>1.15.2 Masalah:</strong><p>{{ $masalah }}</p></li>
            <li><strong>1.15.3 Isu Strategis:</strong></li>
            <ul>
                <li><strong>Isu Global:</strong><p>{{ $isu_global }}</p></li>
                <li><strong>Isu Nasional:</strong><p>{{ $isu_nasional }}</p></li>
                <li><strong>Isu Lokal:</strong><p>{{ $isu_lokal }}</p></li>
            </ul>
            <li><strong>1.15.4 Metode Baru:</strong><p>{{ $metode_baru }}</p></li>
            <li><strong>1.15.5 Keunggulan:</strong><p>{{ $keunggulan }}</p></li>
            <li><strong>1.15.6 Spesifikasi Inovasi:</strong><p>{{ $spesifikasi_inovasi }}</p></li>
        </ul>
        <p><strong>1.16. Tujuan:</strong></p>
        <ul>
            <li><strong>1.16.1. Tujuan Jangka Pendek:</strong><p>{{ $tujuan_pendek }}</p></li>
            <li><strong>1.16.2. Tujuan Jangka Menengah:</strong><p>{{ $tujuan_menengah }}</p></li>
            <li><strong>1.16.3. Tujuan Jangka Panjang:</strong><p>{{ $tujuan_panjang }}</p></li>
        </ul>

        <p><strong>1.17. Manfaat:</strong></p>
        <p>{{ $manfaat }}</p>

        <p><strong>1.18. Skor Kematangan:</strong></p>
        <p>{{ $skor_kematangan }}</p>

        <p><strong>1.19. Hasil Inovasi:</strong></p>
        <ul>
            <li><strong>1.19.1. Hasil Inovasi Sebelum Implementasi:</strong><p> {{ $hasil_inovasi_sebelum }}</p></li>
            <li><strong>1.19.2. Hasil Inovasi Sesudah Implementasi:</strong><p> {{ $hasil_inovasi_setelah }}</p></li>
        </ul>

        <h3>2. INDIKATOR INOVASI</h3>
        <table style="width: 100%; border-collapse: collapse; border: 1px solid black;">
            <thead>
                <tr>
                    <th style="border: 1px solid black; padding: 5px;">No.</th>
                    <th style="border: 1px solid black; padding: 5px;">Indikator SPD</th>
                    <th style="border: 1px solid black; padding: 5px;">Informasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($indikatorData as $indikator)
                <tr>
                    <td style="border: 1px solid black; padding: 5px;">{{ $indikator['no'] }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $indikator['indikator'] }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $indikator['informasi'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
