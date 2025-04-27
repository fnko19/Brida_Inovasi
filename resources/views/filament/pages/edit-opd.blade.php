@extends('layout.app')

@section('title', 'Edit Daftar OPD')

@section('content')
<div>
    <h3 class="text-xl font-bold pb-8">Edit Daftar OPD</h3>

    <div class="card-body">  
        <form action="{{ route('daftar-opd.update', $opd->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="daerah" class="form-label">Daerah</label>
                <input type="text" id="daerah" class="form-control" value="Kota Makassar" disabled>
            </div>

            <div class="mb-3">
                <label for="nama_opd" class="form-label ">Nama OPD</label>
                <input type="text" name="nama_opd" id="nama_opd" class="form-control bg-red-100"
                       value="{{ old('nama_opd', $opd->nama_opd) }}" required>
            </div>

            <div class="mb-3">
                <label for="dibuat_oleh" class="form-label">Dibuat Oleh</label>
                <input type="text" id="dibuat_oleh" class="form-control" 
                       value="Badan Penelitian dan Pengembangan Daerah" disabled>
            </div>

            <div class="mb-3">
                <label for="last_update" class="form-label">Last Update Oleh</label>
                <input type="text" id="last_update" class="form-control" 
                       value="Badan Penelitian dan Pengembangan Daerah" disabled>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('daftar-opd') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-danger">Simpan</button>  
            </div>
        </form>
    </div>
</div>
@endsection