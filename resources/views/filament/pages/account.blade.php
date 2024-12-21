@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
    <div class="space-y-4 mt-8">
        <h1 class="text-2xl font-bold pb-0">
            Account
        </h1>
        <div class="py-4">
            <button class="btn btn-primary">Tambah Account</button>
        </div>
        <div class="card bg-blue-50 p-4">
            <div class="card-body">
                <div class="d-flex justify-between items-center mt-6 mb-4">
                </div>

                <table class="table table-bordered table-striped w-full">
                    <thead class="table-light">
                        <tr class="text-semibold">
                            <th class="align-top text-center">Nama Lengkap</th>
                            <th class="align-top text-center">Username</th>
                            <th class="align-top text-center">Email</th>
                            <th class="align-top text-center">Role</th>
                            <th class="align-top text-center">Ubah data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white text-center">
                            <td>Akbar., S.Pd</td>
                            <td>iga2024.Tangkala1.makassar</td>
                            <td>akbarbone2018@gmail.com</td>
                            <td>upt</td>
                            <td class="align-top font-normal">
                                <div class="flex justify-center space-x-2">
                                   
                                    <a href="#" class="btn btn-sm bg-blue-500 text-white rounded px-2 py-1">
                                        Ubah Data
                                    </a>
                                    <!-- Hapus Data Button -->
                                    <a href="#" class="btn btn-sm bg-red-500 text-white rounded px-2 py-1">
                                        Hapus Data
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-white text-center">
                            <td>Akbar., S.Pd</td>
                            <td>iga2024.Tangkala1.makassar</td>
                            <td>akbarbone2018@gmail.com</td>
                            <td>upt</td>
                            <td class="align-top font-normal">
                                <div class="flex justify-center space-x-2">
                                   
                                    <a href="#" class="btn btn-sm bg-blue-500 text-white rounded px-2 py-1">
                                        Ubah Data
                                    </a>
                                    <!-- Hapus Data Button -->
                                    <a href="#" class="btn btn-sm bg-red-500 text-white rounded px-2 py-1">
                                        Hapus Data
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-white text-center">
                            <td>Akbar., S.Pd</td>
                            <td>iga2024.Tangkala1.makassar</td>
                            <td>akbarbone2018@gmail.com</td>
                            <td>upt</td>
                            <td class="align-top font-normal">
                                <div class="flex justify-center space-x-2">
                                   
                                    <a href="#" class="btn btn-sm bg-blue-500 text-white rounded px-2 py-1">
                                        Ubah Data
                                    </a>
                                    <!-- Hapus Data Button -->
                                    <a href="#" class="btn btn-sm bg-red-500 text-white rounded px-2 py-1">
                                        Hapus Data
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-white text-center">
                            <td>Akbar., S.Pd</td>
                            <td>iga2024.Tangkala1.makassar</td>
                            <td>akbarbone2018@gmail.com</td>
                            <td>upt</td>
                            <td class="align-top font-normal">
                                <div class="flex justify-center space-x-2">
                                   
                                    <a href="#" class="btn btn-sm bg-blue-500 text-white rounded px-2 py-1">
                                        Ubah Data
                                    </a>
                                    <!-- Hapus Data Button -->
                                    <a href="#" class="btn btn-sm bg-red-500 text-white rounded px-2 py-1">
                                        Hapus Data
                                    </a>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    <nav class="mt-4">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">2</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">4</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">»</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection