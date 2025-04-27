@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;  
    }

    .hero-section {
        position: relative;
        height: 100vh; 
        overflow: hidden;
    }

    .hero-background {
        position: fixed; 
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('{{ asset("images/bg2.jpg") }}');
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat; 
        z-index: -1;  
        transition: filter 0.5s ease-in-out; }

    .hero-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        opacity: 0;
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
        z-index: 2;   
    }

    .hero-content h1 {
        font-size: 40px;
        font-weight: bold;
        color: #FF002A;
        text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.7);
    }

    .hero-content p {
        font-size: 18px;
        font-weight: bold;
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
    }

    .blurred {
        filter: blur(8px); 
    }

    .visible {
        opacity: 1;  
    }

    @media screen and (max-width: 768px) {
        .hero-content h1 {
            font-size: 32px;
        }
        .hero-content p {
            font-size: 20px;
        }
    }
</style>

@section('content')
<div class="hero-section">
    <div class="hero-background"></div>
        <div class="hero-content">
            <h1>Selamat Datang 
                @if (Auth::check())
                    <span>{{ Auth::user()->name }}</span>
                @else
                    <span class="pb-2 font-semibold"></span>
                @endif di halaman Inovasi Badan Riset dan Inovasi Daerah Kota Makassar
            </h1>
            <p  class="hidden sm:block pt-8">Kami hadir untuk mendukung inovasi dan riset di Kota Makassar <br>Bersama, kita wujudkan Makassar sebagai kota yang inovatif dan berdaya saing!</p>
        </div>
    </div>

    <div class="space-y-4 mt-12 pb-8">
        <!-- Pengumuman Section -->
        <div class=" bg-white min-w-full shadow-sm rounded-lg p-4 border">
            <h2 class="font-bold text-lg">Pengumuman</h2>
            <div id="pengumuman-list"></div>
        </div>
    </div>

    <div class="bg-white min-w-full shadow-lg rounded-xl p-6 border border-gray-200">
        <div class="flex justify-between items-center mb-4">
            <h1 class="font-bold text-lg text-gray-800">
                Rangkuman Total Inovasi
            </h1>

            <a href="{{ route('export.pdf') }}" 
            class="bg-red-600 text-white px-4 py-1 rounded-lg shadow-md hover:bg-red-700">
                Download PDF
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div class="py-4 bg-red-100 px-6 rounded-lg shadow-md border border-white">
            <h5 class="font-bold pb-3 text-gray-700 ">Daftar OPD</h5>
            <ul class="space-y-2">
                @foreach ($allOpds as $index => $opd)
                    <li class="flex flex-col sm:flex-row justify-between text-gray-800 border-b-2 border-white py-2">
                        <span class="font-semibold">{{ $index + 1 }}. {{ $opd['nama_opd'] }}</span>
                        <span class="font-bold md:pt-2">{{ $opd['jumlah_inovasi'] }} inovasi</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="py-4 bg-red-100 px-6 rounded-lg shadow-md border border-white">
            <h5 class="font-bold pb-3 text-gray-700 ">Daftar UPTD</h5>
            <ul class="space-y-2">
                @foreach ($allUptds as $index => $uptd)
                    <li class="flex flex-col sm:flex-row justify-between text-gray-800 border-b-2 border-white py-2">
                        <span class="font-semibold">{{ $index + 1 }}. {{ $uptd['nama_uptd'] }}</span>
                        <span class="font-bold sm:pt-2">{{ $uptd['jumlah_inovasi'] }} inovasi</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


<script>
    document.addEventListener('scroll', function () {
        const heroBackground = document.querySelector('.hero-background');
        const heroContent = document.querySelector('.hero-content');
        const scrollPosition = window.scrollY;

        if (scrollPosition > 50) {
            heroBackground.classList.add('blurred');
            heroContent.classList.add('visible');
        } else {
            heroBackground.classList.remove('blurred');
            heroContent.classList.remove('visible');
        }
    });

    fetch('http://localhost:8000/api/pengumuman')
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                let pengumumanList = document.getElementById('pengumuman-list');
                pengumumanList.innerHTML = '';

                data.forEach(pengumuman => {
                    const pengumumanElement = document.createElement('div');
                    pengumumanElement.classList.add('flex', 'justify-between', 'mt-2');
                    pengumumanElement.innerHTML = `
                        <p class="font-semibold">${pengumuman.judul}</p>
                        <p class="font-semibold">${pengumuman.tanggal}</p>
                    `;
                    pengumumanList.appendChild(pengumumanElement);
                });
            }
        })
        .catch(error => console.error('Error fetching data:', error));
</script>
@endsection
