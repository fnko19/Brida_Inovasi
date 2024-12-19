@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
    <div class="space-y-4 mt-8">
        <h1 class="text-2xl font-bold pb-4">
            Data Diklat
        </h1>

            <div class="card bg-blue-50 p-4">
                <div class="card-body">

                <div class="justify-between flex ">
                            <div>
                                <label for="pelatihan" class="form-label font-semibold ">Jenis Pelatihan</label>
                                <select name="pelatihan" id="pelatihan" class="form-select bg-gray-50 mb-4">
                                    <option selected>Select</option>
                                    <option value="1">Pelatihan Kepemimpinan Pengawas (PKP)</option>
                                    <option value="2">Pelatihan Kepemimpinan Administrator (PKA)</option>
                                    <option value="3">Pelatihan Kepemimpinan Nasional II (PKN II)</option>
                                    <option value="4">Pelatihan Kepemimpinan Nasional I (PKN I)</option>
                                    <option value="5">Pelatihan Dasar CPNS</option>
                                    <option value="6">Kepala Daerah</option>
                                </select>
                            </div>

                            <div>
                                <label for="pelatihan" class="form-label font-semibold ">Cari Laporan</label>
                                <input type="text" class="form-control h-10 w-250" placeholder="pencarian" />
                            </div>


                            
                        </div>

                <table class="table table-bordered table-striped w-full">
                    <thead class="table-light">
                        <tr class="text-semibold">
                            <th class="align-top">#</th>
                            <th class="align-top">Nama Peserta</th>
                            <th class="align-top">NIP</th>
                            <th class="align-top">Instansi</th>
                            <th class="align-top">Jenis Pelatihan</th>
                            <th class="align-top">Judul Proyek Perubahan / Aksi Perubahan</th>
                            <th class="align-top">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white h-8">
                            <td></td>
                            <td> </td>
                            <td></td>
                            <td> </td>
                            <td></td>
                            <td> </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    <nav class="mt-4">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">»</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>





    </div>
@endsection