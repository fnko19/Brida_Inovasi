@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
<div class="space-y-4 py-2">
    <h1 class="text-xl font-bold pb-4">
        Daftar UPTD
    </h1>
    
    <div class="card bg-red-100">
        <div class="card-body">
            <h4 class="font-bold text-lg pb-4">Kota Makassar</h4>

            <!-- Wrapper untuk scrolling -->
            <div class="overflow-x-auto">
                <table class="table table-bordered table-striped min-w-full">
                    <thead>
                        <tr class="text-semibold bg-red-700 text-white">
                            <th class="align-top">#</th>
                            <th class="align-top">Daerah</th>
                            <th class="align-top">OPD</th>
                            <th class="align-top">Nama UPT</th>
                            <th class="align-top text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($daftarUptd as $index => $uptd)
                        <tr class="bg-white">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $uptd->daerah }}</td>
                            <td>{{ $uptd->daftarOpd ? $uptd->daftarOpd->nama_opd : 'Tidak Ada Data' }}</td>
                            <td>{{ $uptd->nama_uptd }}</td>
                            <td class="align-top font-normal">
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('daftaruptd.edit', $uptd->id) }}" class="btn btn-sm">
                                       <img src="{{ asset('images/6.png') }}" alt="Edit" width="20" height="20">
                                    </a>
                                    <!-- Tombol Hapus -->
                                    <form id="delete-form-{{ $uptd->id }}" action="{{ route('daftaruptd.destroy', $uptd->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal-{{ $uptd->id }}">
                                            <img src="{{ asset('images/5.png') }}" alt="Delete" width="20" height="20">
                                        </button>
                                    </form>

                                    <!-- Modal -->
                                    <div class="modal fade" id="confirmDeleteModal-{{ $uptd->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel-{{ $uptd->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-bold" id="confirmDeleteModalLabel-{{ $uptd->id }}">Konfirmasi Penghapusan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger" form="delete-form-{{ $uptd->id }}">Hapus</button>
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

        </div>
    </div>
</div>
@endsection
