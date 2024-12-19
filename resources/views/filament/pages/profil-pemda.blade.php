@extends('layout.app')

@section('content')
    <div class="space-y-4 mt-8">
        <h1 class="text-2xl font-bold">
            Profil Pemda
        </h1>

        <div class="pt-4 pb-6 flex items-center justify-between">
            <a href="#" class="text-lg text-blue-700 hover:underline">Unduh Pakta Integritas</a>
            <button class="bg-blue-500 px-3 py-2  text-white font-semibold rounded-md">Kirim Pakta Integritas Baru</button>
        </div>      
        
        <div class="card border-2 border-gray-300 shadow-md pt-3 py-12 px-4 bg-blue-100">
            <h2 class="py-4 text-lg font-bold">Kota Makassar</h2>
            <table class="table border-2 bg-white border-gray-400 table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Tingkatan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">Kota / Kabupaten</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-sm ">
                            <img src="{{ asset('images/1.png') }}" alt="Eye" width="20" height="20">
                        </a>
                        <a href="#" class="btn btn-sm ">
                            <img src="{{ asset('images/2.png') }}" alt="Pakta Integritas" width="20" height="20">
                        </a>
                        <a href="#" class="btn btn-sm">
                            <img src="{{ asset('images/3.png') }}" alt="Unduk Dokumen" width="20" height="20">
                        </a>
                        <a href="#" class="btn btn-sm">
                            <img src="{{ asset('images/4.png') }}" alt="Unduh XLS" width="20" height="20">
                        </a>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
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
@endsection
