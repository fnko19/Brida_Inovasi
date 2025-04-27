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
            text-align: justify;
        }
        .header {
            text-align: center;
            margin-bottom: 0px;
        }
        .header img {
            margin: 0;
            height: 120px;
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
            margin-top: 0.25cm;
            margin-bottom: 0.25cm;
        }
        
        p + p {
            margin-top: 0cm;
        }

        p > strong + p {
            margin-top: 0.35cm;
        }
        .head{
            padding-top: 0.5cm;
        }
        .padding-sub{
            padding-left:0.5cm;
        }
        .padding-left {
            padding-left: 1.35cm;  
        }
        .padding-left2 {
            padding-left: 1.55cm;  
        }
        .padding-left3 {
            padding-left: 1.05cm;  
        }
        .padding-left4 {
            padding-left: 2.45cm;  
        }
        .padding-left5 {
            padding-left: 1.95cm;  
        }
        .padding-left6 {
            padding-left: 2.98cm;  
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
        <div>
            <p><strong>Pemerintah Daerah: Kota Makassar</p>
            <p><strong>Nomor Registrasi: {{ $nomor_registrasi}}</p>
        </div>
        <h4 class="head">1. PROFIL INOVASI</h4>
        <p class="padding-sub"><strong>1.1. Nama Inovasi:</strong></p>
        <p class="padding-left">{{ $nama_inovasi }}</p>

        <p class="padding-sub"><strong>1.2. Dibuat Oleh:</strong></p>
        <p class="padding-left">{{ $dibuat_oleh }}</p>

        <p class="padding-sub"><strong>1.3. Tahapan Inovasi:</strong></p>
        <p class="padding-left">{{ $tahapan_inovasi }}</p>

        <p class="padding-sub"><strong>1.4. Inisiator:</strong></p>
        <p class="padding-left">{{ $inisiator }}</p>

        <p class="padding-sub"><strong>1.5. Nama Inisiator:</strong></p>
        <p class="padding-left">{{ $nama_inisiator }}</p>

        <p class="padding-sub"><strong>1.6. Jenis Inovasi:</strong></p>
        <p class="padding-left">{{ $jenis_inovasi }}</p>

        <p class="padding-sub"><strong>1.7. Bentuk Inovasi:</strong></p>
        <p class="padding-left">{{ $bentuk_inovasi }}</p>

        <p class="padding-sub"><strong>1.8. Tematik:</strong></p>
        <p class="padding-left">{{ $tematik }}</p>

        <p class="padding-sub"><strong>1.9. Program Prioritas:</strong></p>
        <p class="padding-left">{{ $prioritas }}</p>

        <p class="padding-sub"><strong>1.10. Jenis Program Prioritas:</strong></p>
        <p class="padding-left2">{{ $misi }}</p>

        <p class="padding-sub"><strong>1.11. Urusan Pemerintahan Terkait Inovasi:</strong></p>
        <p class="padding-left2">{{ $urusan_utama }}</p>

        <p class="padding-sub"><strong>1.12. Waktu Uji:</strong></p>
        <p class="padding-left2">{{ $waktu_uji }}</p>

        <p class="padding-sub"><strong>1.13. Waktu Penerapan:</strong></p>
        <p class="padding-left2">{{ $waktu_penerapan }}</p>

        <p class="padding-sub"><strong>1.14. Apakah Sudah Berkembang?:</strong></p>
        <p class="padding-left2">{{ $berkembang }}</p>

        <p class="padding-sub"><strong>1.15. Rancang Bangun:</strong></p>
        <ul>
            <li  class="padding-left3"><strong>1.15.1. Dasar Hukum:</strong><li class="padding-left4">{{ $dasar_hukum }}</li></li>
            <li  class="padding-left3"><strong>1.15.2. Masalah:</strong><li class="padding-left4">{{ $masalah }}</li></li>
            <li  class="padding-left3"><strong>1.15.3. Isu Strategis:</strong></li>
            <ul>
                <li class="padding-left5"><strong>Isu Global:</strong><p>{{ $isu_global }}</p></li>
                <li class="padding-left5"><strong>Isu Nasional:</strong><p>{{ $isu_nasional }}</p></li>
                <li class="padding-left5"><strong>Isu Lokal:</strong><p>{{ $isu_lokal }}</p></li>
            </ul>
            <li class="padding-left3"><strong>1.15.4. Metode Baru:</strong><li class="padding-left4">{{ $metode_baru }}</li></li>
            <li class="padding-left3"><strong>1.15.5. Keunggulan:</strong><li class="padding-left4">{{ $keunggulan }}</li></li>
            <li class="padding-left3"><strong>1.15.6. Spesifikasi Inovasi:</strong><li class="padding-left4">{{ $spesifikasi_inovasi }}</li></li>
        </ul>
        <p class="padding-sub"><strong>1.16. Tujuan:</strong></p>
        <ul>
            <li class="padding-left3"><strong>1.16.1. Tujuan Jangka Pendek:</strong><li class="padding-left4">{{ $tujuan_pendek }}</p></li>
            <li class="padding-left3"><strong>1.16.2. Tujuan Jangka Menengah:</strong><li class="padding-left4">{{ $tujuan_menengah }}</p></li>
            <li class="padding-left3"><strong>1.16.3. Tujuan Jangka Panjang:</strong><li class="padding-left4">{{ $tujuan_panjang }}</p></li>
        </ul>

        <p class="padding-sub"><strong>1.17. Manfaat:</strong></p>
        <p class="padding-left2">{{ $manfaat }}</p>

        <p class="padding-sub"><strong>1.18. Skor Kematangan:</strong></p>
        <p class="padding-left2">{{ $skor_kematangan }}</p>

        <p class="padding-sub"><strong>1.19. Hasil Inovasi:</strong></p>
            <p class="padding-left2"><strong>1.19.1. Hasil Inovasi Sebelum Implementasi:</strong><p class="padding-left6"> {{ $hasil_inovasi_sebelum }}</p></p>
            <p class="padding-left2"><strong>1.19.2. Hasil Inovasi Sesudah Implementasi:</strong><p class="padding-left6"> {{ $hasil_inovasi_setelah }}</p</p>

        <h4 class="head">2. INDIKATOR INOVASI</h4>
        <table style="width: 100%; border-collapse: collapse; border: 1px solid black;">
            <thead>
                <tr>
                    <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">No.</th>
                    <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Indikator SPD</th>
                    <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Informasi</th>
                    <th style="border: 1px solid black; padding: 5px; background-color: lightgray;">Bukti Dukung</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($indikatorData as $indikator)
                <tr>
                    <td style="border: 1px solid black; padding: 5px;">{{ $indikator['no'] }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $indikator['indikator'] }}</td>
                    <td style="border: 1px solid black; padding: 5px;">{{ $indikator['informasi'] }}</td>
                    <td style="border: 1px solid black; padding: 5px;">
                @if(isset($indikator['bukti_dukung']) && !empty($indikator['bukti_dukung']))
                    {{ $indikator['bukti_dukung'] }} <!-- Menampilkan bukti dukung jika ada -->
                @else
                    Tidak Tersedia
                @endif
            </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
