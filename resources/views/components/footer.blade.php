<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Footer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen">
    <footer class="bg-gray-100 px-12 py-12 border-t border-gray-200">
        <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            
            <!-- Informasi Kantor -->
            <div class="space-y-4">
                <h2 class="text-lg font-semibold text-gray-800">Kantor Gubernur Sulawesi Selatan</h2>
                <p class="text-sm text-gray-700 leading-relaxed">
                    Jl. Ahmad Yani No 2, Kecamatan Ujung Pandang,<br>
                    Kota Makassar, Sulawesi Selatan 90231
                </p>
            </div>

            <!-- Navigasi -->
            <div class="flex flex-col space-y-4">
                <h3 class="text-lg font-semibold text-gray-800">Navigasi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-4 text-sm text-gray-700">
                    <ul class="space-y-2">
                        <li><a href="{{ route('landing') }}" class="hover:underline">Dashboard</a></li>
                        <li><a href="{{ route('faq') }}" class="hover:underline">FAQ</a></li>
                        <li><a href="{{ route('profil-pemda') }}" class="hover:underline">Profil Pemda</a></li>
                        <li><a href="{{ route('inovasi-daerah') }}" class="hover:underline">Inovasi Daerah</a></li>
                        <li><a href="{{ route('inovasi-pemerintah-daerah') }}" class="hover:underline">Inovasi Pemerintah Daerah</a></li>
                        <li><a href="{{ route('data-laporan-diklat') }}" class="hover:underline">Data Laporan Diklat</a></li>
                    </ul>
                    <ul class="space-y-2">
                        <li><a href="{{ route('konfigurasi-akun') }}" class="hover:underline">Konfigurasi Akun</a></li>
                        <li><a href="{{ route('account') }}" class="hover:underline">Account</a></li>
                        <li><a href="{{ route('daftar-opd') }}" class="hover:underline">Daftar OPD</a></li>
                        <li><a href="{{ route('daftar-uptd') }}" class="hover:underline">Daftar UPTD</a></li>
                        <li><a href="{{ route('akses-api') }}" class="hover:underline">Akses API</a></li>
                    </ul>
                </div>
            </div>

            <!-- Media Sosial -->
            <div class="space-y-4 lg:pl-20">
                <h3 class="text-lg font-semibold text-gray-800">Ikuti Kami</h3>
                    <ul class="flex space-x-3">
                    <li>
                        <a href="https://www.threads.net/@balitbangdakotamakassar?xmt=AQGzBQ-tXaKH-j2jCNZQyZYqDybh71j_N2YjfrR2TKfJ3tQ" class="text-gray-500 hover:text-gray-700">
                            <img src="{{ asset('images/Threads.png') }}" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
                        </a>
                    </li>
                    <li>
                        <a href="https://web.facebook.com/balitbangda.makassar" class="text-gray-500 hover:text-gray-700">
                            <img src="{{ asset('images/Facebook.png') }}" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/balitbangdakotamakassar?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-gray-500 hover:text-gray-700">
                            <img src="{{ asset('images/ig.png') }}" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
                        </a>
                    </li>
                    <li>
                        <a href="https://x.com/BalitbangdaMks" class="text-gray-500 hover:text-gray-700">
                            <img src="{{ asset('images/X.png') }}" class="h-7 w-7" viewBox="0 0 24 24" fill="currentColor">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </footer>

    <div class="text-center border-t bg-red-700 border-gray-200 py-2">
        <p class="text-xs sm:text-sm text-white">
            &copy; 2024 Badan Riset Daerah dan Inovasi Kota Makassar | All Rights Reserved.
        </p>
    </div>

</body>
</html>
