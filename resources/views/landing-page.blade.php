@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
    <div class="space-y-4 mt-8">
        <h1 class="text-2xl font-bold">
            Dashboard Indeks Inovasi Daerah
        </h1>

        <div class="space-y-4">
            <div class="bg-blue-50 min-w-full shadow-sm rounded-lg p-4 border">
                <h2 class="font-semibold text-lg text-gray-800">Pengumuman</h2>
                <div class="flex justify-between">
                    <p class="text-gray-800 mt-2">
                        Radiogram Perpanjangan Pelaporan IID 2024
                    </p>
                    <p class="text-gray-800 mt-2">
                        26/07/2024
                    </p>
                </div>
                <div class="flex justify-between">
                    <p class="text-gray-800 mt-2">
                        Radiogram Perpanjangan Kedua Pelaporan IID 2024
                    </p>
                    <p class="text-gray-800 mt-2">
                        18/08/2024
                    </p>
                </div>
            </div>

            <div class="bg-blue-50 min-w-full shadow-sm rounded-lg p-4 border">
                <h2 class="font-semibold text-lg text-gray-800">Hitung Mundur Pengisian Indeks Inovasi Daerah</h2>
                    <p class="text-gray-800 mt-2">
                        Waktu Sudah Habis
                    </p>
            </div>

            <!-- <div class="flex items-center">
                <img src="{{ asset('images/maps.png') }}" alt="Peta Kota Makassar" class="w-full">
            </div> -->

        <div class="pt-8 mt-12">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card bg-blue-200 border-2 border-gray-200 shadow-md text-black">
                    <div class="card-body">
                        <h5 class="card-title font-semibold">Indeks Rata-Rata Kota</h5>
                        <p class="card-text font-bold text-xl">76.56</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <div class="card bg-blue-200 border-2 border-gray-200 shadow-md text-black">
                    <div class="card-body">
                        <h5 class="card-title font-semibold">Skor Indeks Inovasi Daerah</h5>
                        <p class="card-text font-bold text-xl">76.56</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <div class="card bg-blue-200 border-2 border-gray-200 shadow-md text-black">
                    <div class="card-body">
                        <h5 class="card-title font-semibold">Total Inovasi Pemda</h5>
                        <p class="card-text font-bold text-xl">101</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
               <div class="card bg-blue-200 border-2 border-gray-200 shadow-md text-black">
                    <div class="card-body">
                        <h5 class="card-title font-semibold">Baru</h5>
                        <p class="card-text font-bold text-xl">0</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card bg-blue-200 border-2 border-gray-200 shadow-md text-black">
                    <div class="card-body">
                        <h5 class="card-title font-semibold">Uji Coba</h5>
                        <p class="card-text font-bold text-xl">0</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card bg-blue-200 border-2 border-gray-200 shadow-md text-black">
                    <div class="card-body">
                        <h5 class="card-title font-semibold">Penerapan</h5>
                        <p class="card-text font-bold text-xl">101</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card bg-blue-200 border-2 border-gray-200 shadow-md text-black">
                    <div class="card-body">
                        <h5 class="card-title font-semibold">Rata - rata Inovasi Per Daerah</h5>
                        <p class="card-text font-bold text-xl">NaN</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <div class="card bg-blue-200 border-2 border-gray-200 shadow-md text-black">
                    <div class="card-body">
                        <h5 class="card-title font-semibold">Skor Tertinggi</h5>
                        <p class="card-text font-bold text-xl">()</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <div class="card bg-blue-200 border-2 border-gray-200 shadow-md text-black">
                    <div class="card-body">
                        <h5 class="card-title font-semibold">Skor Terendah</h5>
                        <p class="card-text font-bold text-xl">()</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
            

    </div>
@endsection
