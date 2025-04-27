@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
<head>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<div class="container">
    <h1 class="text-xl font-bold pb-8">Edit Daftar UPTD</h1>
    <form action="{{ route('daftar-uptd.update', $daftarUptd->id) }}" method="POST">
        @csrf
        @method('put') 
        
        <!-- Input Nama UPTD -->
        <div class="form-group">
            <label for="nama-uptd" class="font-semibold pb-2">Nama UPTD</label>
            <input type="text" name="nama_uptd" id="nama-uptd" class="form-control bg-red-100" 
                value="{{ old('nama_uptd', $daftarUptd->nama_uptd) }}" required>
        </div>

        <!-- Dropdown Nama OPD -->
        <div class="form-group pt-4">
            <label for="daftar_opd_id" class="font-semibold pb-2">Nama OPD</label>
            <div class="relative">
                <select name="daftar_opd_id" id="daftar-opd" class="form-control bg-red-100" required>
                    <option value="">Pilih salah satu opsi</option>
                    @foreach($daftarOpds as $opd)
                        <option value="{{ $opd->id }}"
                            {{ old('daftar_opd_id', $daftarUptd->daftar_opd_id) == $opd->id ? 'selected' : '' }}>
                            {{ $opd->nama_opd }}
                        </option>
                    @endforeach
                </select>
                <span class="absolute top-1/2 right-2 transform -translate-y-1/2 text-gray-600">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </div>
        </div>

        <!-- Input Daerah -->
        <div class="form-group pt-4 pb-8">
            <label for="daerah" class="font-semibold pb-2">Daerah</label>
            <input type="text" name="daerah" id="daerah" class="form-control bg-red-100"
                value="{{ old('daerah', $daftarUptd->daerah) }}" readonly>
        </div>

        <!-- Tombol Simpan dan Batal -->
        <div class="form-group">
            <button type="submit" class="btn pb-2 text-white font-semibold hover:bg-red-500 bg-red-700">Simpan Perubahan</button>
            <a href="{{ route('daftar-uptd') }}" class="btn btn-secondary font-semibold">Batal</a>
        </div>
    </form>
</div>
@endsection