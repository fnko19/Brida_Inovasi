@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
    <div class="space-y-4 py-2">
        <h1 class="text-xl font-bold pb-16">
            Konfigurasi Akun
        </h1>
       
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