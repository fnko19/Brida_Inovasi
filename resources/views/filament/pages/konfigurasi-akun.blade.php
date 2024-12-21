@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
    <div class="space-y-4 mt-8">
        <h1 class="text-2xl font-bold pb-4">
            Konfigurasi Akun
        </h1>

               <div class="flex justify-between items-center mt-6 mb-4">
            <div class="flex items-center space-x-4">
                <!-- Kotak Cari Username -->
                <input type="text" class="form-control w-[200px]" placeholder="Cari username" />

                             <div class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">
                    <span>Cari</span>
                </div>
            </div>

          
            <button class="btn btn-primary">Tambah Account</button>
        </div>

        <div class="card bg-blue-50 p-4">
            <div class="card-body">
                <table class="table table-bordered table-striped w-full">
                    <thead class="table-light">
                        <tr class="text-semibold">
                            <th class="align-top">#</th>
                            <th class="align-top">Role</th>
                            <th class="align-top">Daerah</th>
                            <th class="align-top">OPD</th>
                            <th class="align-top">Username</th>
                            <th class="align-top">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white h-8">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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