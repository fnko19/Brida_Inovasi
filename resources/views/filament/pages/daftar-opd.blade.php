@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
<div class="container py-2">
    <h1 class="text-xl font-bold pb-10">
        Daftar OPD
    </h1>

    <div class="card">
        <div class="card-header bg-red-700 text-white">
            <h4 class="font-semibold text-lg">Kota Makassar</h4>
        </div>
        <div class="card-body bg-red-100">
            @if($daftarOpd->isEmpty())
                <p class="text-center text-muted">Tidak ada data tersedia.</p>
            @else
                <div class="table-responsive">
                    <table class="table bg-white table-bordered table-striped">
                        <thead class="thead-light text-md bg-red-300">
                            <tr>
                                <th>#</th>
                                <th>Nama OPD</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftarOpd as $key => $opd)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-nowrap">{{ $opd->nama_opd }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2 flex-wrap">
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('daftaropd.edit', $opd->id) }}" class="btn btn-sm">
                                                <img src="{{ asset('images/6.png') }}" alt="Edit" width="20" height="20">
                                            </a>
                                            <!-- Delete Button -->
                                            <form id="delete-form-{{ $opd->id }}" action="{{ route('daftaropd.destroy', $opd->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal-{{ $opd->id }}">
                                                    <img src="{{ asset('images/5.png') }}" alt="Delete" width="20" height="20">
                                                </button>
                                            </form>

                                            <!-- Modal -->
                                            <div class="modal fade" id="confirmDeleteModal-{{ $opd->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel-{{ $opd->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title font-bold" id="confirmDeleteModalLabel-{{ $opd->id }}"> Konfirmasi Penghapusan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            Apakah Anda yakin ingin menghapus data ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger" form="delete-form-{{ $opd->id }}">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
