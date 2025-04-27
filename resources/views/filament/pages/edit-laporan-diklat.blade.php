@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
<head>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<div class="container">
    <h1 class="text-xl font-bold pb-12">Edit Data Diklat</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Edit -->
    <form action="{{ route('data-laporan-diklat.update', $diklat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Peserta -->
        <div class="form-group pb-3">
            <label for="nama" class="pb-2 font-bold">Nama Peserta</label>
            <input type="text" name="nama" class="form-control bg-red-100" value="{{ old('nama', $diklat->nama) }}" required>
        </div>

        <!-- NIP -->
        <div class="form-group pb-3">
            <label for="nip" class="py-2 font-bold">NIP</label>
            <input type="text" name="nip" class="form-control bg-red-100" value="{{ old('nip', $diklat->nip) }}" required>
        </div>

        <!-- Instansi -->
        <div class="form-group pb-3">
            <label for="instansi" class="py-2 font-bold">Instansi</label>
            <input type="text" name="instansi" class="form-control bg-red-100" value="{{ old('instansi', $diklat->instansi) }}" required>
        </div>

        <!-- Jenis Pelatihan -->
        <div class="form-group pb-3">
            <label for="jenis_pelatihan" class="py-2 font-bold">Jenis Pelatihan</label>
            <div class="relative">
                <select name="jenis_pelatihan" class="form-control bg-red-100" required>
                    <option value="1" {{ old('jenis_pelatihan', $diklat->jenis_pelatihan) == 1 ? 'selected' : '' }}>Pelatihan Kepemimpinan Pengawas (PKP)</option>
                    <option value="2" {{ old('jenis_pelatihan', $diklat->jenis_pelatihan) == 2 ? 'selected' : '' }}>Pelatihan Kepemimpinan Administrator (PKA)</option>
                    <option value="3" {{ old('jenis_pelatihan', $diklat->jenis_pelatihan) == 3 ? 'selected' : '' }}>Pelatihan Kepemimpinan Nasional II (PKN II)</option>
                    <option value="4" {{ old('jenis_pelatihan', $diklat->jenis_pelatihan) == 4 ? 'selected' : '' }}>Pelatihan Kepemimpinan Nasional I (PKN I)</option>
                    <option value="5" {{ old('jenis_pelatihan', $diklat->jenis_pelatihan) == 5 ? 'selected' : '' }}>Pelatihan Dasar CPNS</option>
                    <option value="6" {{ old('jenis_pelatihan', $diklat->jenis_pelatihan) == 6 ? 'selected' : '' }}>Kepala Daerah</option>
                </select>
                <span class="absolute top-1/2 right-2 transform -translate-y-1/2 text-gray-600">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </div>
        </div>

        <!-- Judul Pelatihan -->
        <div class="form-group pb-4">
            <label for="judul_pelatihan" class="py-2 font-bold">Judul Proyek Perubahan</label>
            <input type="text" name="judul_pelatihan" class="form-control bg-red-100" value="{{ old('judul_pelatihan', $diklat->judul_pelatihan) }}" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn bg-red-700 text-white font-semibold hover:bg-red-500">
            Simpan
        </button>

        <!-- Cancel Button -->
        <a href="{{ route('data-laporan-diklat') }}" class="btn btn-secondary font-semibold">Batal</a>
    </form>
</div>
@endsection