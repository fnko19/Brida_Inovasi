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
            margin-bottom: 20px;
        }
        .header img {
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
            margin-top: 5px;
            margin-bottom: 5px; 
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/kemenag-logo.png') }}" alt="Logo">
        <h2>KEMENTERIAN DALAM NEGERI</h2>
        <h3>BADAN STRATEGI KEBIJAKAN DALAM NEGERI</h3>
        <h4>LAPORAN INOVASI DAERAH</h4>
    </div>

    <div class="content">
        <p><strong>Pemerintah Daerah:</strong> Kota Makassar</p>
        <p><strong>Nomor Registrasi:</strong> -</p>

        <h3>1. PROFIL INOVASI</h3>
        <p><strong>1.1. Nama Inovasi:</strong> {{ $nama_inovasi }}</p>
        <p><strong>1.2. Dibuat Oleh:</strong> {{ $dibuat_oleh }}</p>
        <p><strong>1.3. Tahapan Inovasi:</strong> {{ $tahapan_inovasi }}</p>
        <p><strong>1.4. Inisiator:</strong> {{ $inisiator }}</p>
        <p><strong>1.5. Nama Inisiator:</strong> {{ $nama_inisiator }}</p>
        <p><strong>1.6. Jenis Inovasi:</strong> {{ $jenis_inovasi }}</p>
        <p><strong>1.7. Bentuk Inovasi:</strong> {{ $bentuk_inovasi }}</p>
        <p><strong>1.8. Tematik:</strong> {{ $tematik }}</p>
        <p><strong>1.9. Prioritas:</strong> {{ $prioritas }}</p>
        <p><strong>1.10. Misi Beririsan:</strong> {{ $misi }}</p>
        <p><strong>1.11. Urusan Utama:</strong> {{ $urusan_utama }}</p>
        <p><strong>1.12. Urusan Beririsan:</strong> {{ $urusan_iris }}</p>
        <p><strong>1.13. Waktu Uji:</strong> {{ $waktu_uji }}</p>
        <p><strong>1.14. Waktu Penerapan:</strong> {{ $waktu_penerapan }}</p>
        <p><strong>1.15. Apakah Sudah Berkembang?:</strong> {{ $berkembang }}</p>
        <p><strong>1.16. Rancang Bangun:</strong></p>
        <ul>
            <li><strong>Dasar Hukum:</strong> {{ $dasar_hukum }}</li>
            <li><strong>Masalah:</strong> {{ $masalah }}</li>
            <li><strong>Isu Strategis:</strong> {{ $isu_strategis }}</li>
            <li><strong>Metode Baru:</strong> {{ $metode_baru }}</li>
            <li><strong>Keunggulan:</strong> {{ $keunggulan }}</li>
            <li><strong>Spesifikasi Inovasi:</strong> {{ $spesifikasi_inovasi }}</li>
        </ul>
        <p><strong>1.17. Tujuan:</strong> {{ $tujuan }}</p>
        <p><strong>1.18. Manfaat:</strong> {{ $manfaat }}</p>
    </div>
</body>

</html>
