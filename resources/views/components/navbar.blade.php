<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <!-- Tambahkan Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com">

    </script>
</head>
<body>
    <!-- Navbar -->
    <nav class="bg-white px-4 text-black shadow-md">
        <div class="h-20 px-6 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <img src="{{ asset('images/logo-brida.png') }}" alt="Logo" class="w-14 h-14">
                <span class="text-md ps-6 font-bold">
                    DASHBOARD BADAN RISET DAN <br> INOVASI DAERAH MAKASSAR
                </span>
            </div>

            <!-- Hamburger Menu Icon (Responsive) -->
            <div class="lg:hidden">
                <button id="menu-toggle" class="text-3xl focus:outline-none">
                    &#9776; <!-- Hamburger Icon -->
                </button>
            </div>

            <!-- Navigation Menu -->
            <ul id="menu" class="hidden lg:flex space-x-8 items-center text-lg">
                <!-- Dashboard -->
                <li class="relative group">
                    <a href="#" class="hover:text-blue-600 font-semibold">Dashboard</a>
                    <ul class="absolute hidden group-hover:block bg-blue-50 shadow-sm right-0 w-[160px] mt-2 space-y-2 py-2 px-8 rounded">
                        <li><a href="{{ route('landing') }}" class="block hover:font-semibold p-2 rounded">Dashboard</a></li>
                        <li><a href="{{ route('arsip') }}" class="block hover:font-semibold p-2 rounded">Arsip</a></li>
                        <li><a href="{{ route('FAQ') }}" class="block hover:font-semibold p-2 rounded">FAQ</a></li>
                    </ul>
                </li>

                <!-- Database Inovasi Daerah -->
                <li class="relative group">
                    <a href="#" class="hover:text-blue-600 font-semibold">Database Inovasi Daerah</a>
                    <ul class="absolute hidden group-hover:block bg-blue-50 shadow-sm right-0 w-[200px] mt-2 space-y-2 py-2 px-4 rounded">
                        <li><a href="{{ route('profil-pemda') }}" class="block hover:font-semibold p-2 rounded">Profil Pemda</a></li>
                        <li><a href="{{ route('inovasi-daerah') }}" class="block hover:font-semibold p-2 rounded">Inovasi Daerah</a></li>
                    </ul>
                </li>

                <!-- Lomba Inovasi Daerah -->
                <li class="relative group">
                    <a href="#" class="hover:text-blue-600 font-semibold">Lomba Inovasi Daerah</a>
                    <ul class="absolute hidden group-hover:block bg-blue-50 shadow-sm right-0 w-[200px] mt-2 space-y-2 py-2 px-4 rounded">
                        <li><a href="{{ route('inovasi-pemerintah-daerah') }}" class="block hover:font-semibold p-2 rounded">Inovasi Pemerintah Daerah</a></li>
                    </ul>
                </li>

                <!-- Laporan Diklat -->
                <li class="relative group">
                    <a href="#" class="hover:text-blue-600 font-semibold">Laporan Diklat</a>
                    <ul class="absolute hidden group-hover:block bg-blue-50 shadow-sm right-0 w-[210px] space-y-2 py-2 px-4 rounded">
                        <li><a href="{{ route('data-laporan-diklat') }}" class="block hover:font-semibold p-2 rounded">Data Laporan Diklat</a></li>
                        <li><a href="{{ route('konfigurasi-akun') }}" class="block hover:font-semibold p-2 rounded">Konfigurasi Akun</a></li>
                    </ul>
                </li>

                <!-- Konfigurasi -->
                <li class="relative group">
                    <a href="#" class="hover:text-gray-700 font-semibold">Konfigurasi</a>
                    <ul class="absolute hidden group-hover:block bg-blue-50 shadow-sm mt-2 right-0 w-[200px]  space-y-2 py-2 px-4 rounded">
                        <li><a href="{{ route('account') }}" class="block hover:font-semibold p-2 rounded">Account</a></li>
                        <li><a href="{{ route('daftar-opd') }}" class="block hover:font-semibold p-2 rounded">Daftar OPD</a></li>
                        <li><a href="{{ route('daftar-uptd') }}" class="block hover:font-semibold p-2 rounded">Daftar UPTD</a></li>
                        <li><a href="{{ route('akses-api') }}" class="block hover:font-semibold p-2 rounded">Akses API</a></li>
                    </ul>
                </li>

                <!-- user -->
                <li class="flex items-center relative group">
                    <a href="#">
                        <img src="{{ asset('images/user.png') }}" alt="user" class="w-11 h-11">
                    </a>
                    <!-- Dropdown user yang di-hidden secara default -->
                    <ul class="absolute bg-blue-50 flex flex-column space-y-2 shadow-sm py-4 justify-between px-4 rounded right-0 top-full w-[160px] box-border hidden">
                        <li class="flex items-center">
                            @if (Auth::check())
                                <span class="pb-2">halo {{ Auth::user()->name }}</span>
                            @else
                                <span class="pb-2">Guest</span>
                            @endif
                        </li>
                        <li class="flex items-start">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <button 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                class="bg-blue-500 font-semibold text-white text-md px-4 py-1 rounded-md hover:bg-blue-700">
                                Logout
                            </button>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

        <!-- Mobile Menu -->
        <ul id="mobile-menu" class="lg:hidden hidden flex-col space-y-4 px-6 py-4 bg-white text-black shadow-sm">
            <li><a href="{{ route('landing') }}" class="block hover:font-semibold p-2">Dashboard</a></li>
            <li><a href="{{ route('arsip') }}" class="block hover:font-semibold p-2 rounded">Arsip</a></li>
            <li><a href="{{ route('FAQ') }}" class="block hover:font-semibold p-2 rounded">FAQ</a></li>
            <li><a href="{{ route('profil-pemda') }}" class="block hover:font-semibold p-2 rounded">Profil Pemda</a></li>
            <li><a href="{{ route('inovasi-daerah') }}" class="block hover:font-semibold p-2 rounded">Inovasi Daerah</a></li>
            <li><a href="{{ route('inovasi-pemerintah-daerah') }}" class="block hover:font-semibold p-2 rounded">Inovasi Pemerintah Daerah</a></li>
            <li><a href="{{ route('data-laporan-diklat') }}" class="block hover:font-semibold p-2 rounded">Data Laporan Diklat</a></li>
            <li><a href="{{ route('konfigurasi-akun') }}" class="block hover:font-semibold p-2 rounded">Konfigurasi Akun</a></li>
            <li><a href="{{ route('account') }}" class="block hover:font-semibold p-2 rounded">Account</a></li>
            <li><a href="{{ route('daftar-opd') }}" class="block hover:font-semibold p-2 rounded">Daftar OPD</a></li>
            <li><a href="{{ route('daftar-uptd') }}" class="block hover:font-semibold p-2 rounded">Daftar UPTD</a></li>
            <li><a href="{{ route('akses-api') }}" class="block hover:font-semibold p-2 rounded">Akses API</a></li>
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                    class="bg-blue-500 font-semibold text-white text-md px-4 py-1 rounded-md hover:bg-blue-700">
                    Logout
                </button>
            </li>
        </ul>
    </nav>

    <script>
        // Toggle menu untuk versi mobile
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Menambahkan toggle untuk menu dropdown ketika diklik
        document.querySelectorAll('.group').forEach((item) => {
            item.addEventListener('click', function() {
                // Menambahkan atau menghapus kelas 'hidden' pada dropdown
                const dropdown = this.querySelector('ul');
                if (dropdown) {
                    dropdown.classList.toggle('hidden');
                }
            });
        });
    </script>
</body>
</html>

