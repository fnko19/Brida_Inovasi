@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
    <div class="space-y-4 mt-16">
        <h1 class="text-2xl font-bold pb-16">
            Daftar OPD
        </h1>
        
        <div class="card bg-blue-50 p-4">
            <div class="card-body">
                <h4 class="font-bold text-lg">Kota Makassar</h4>
                
                <div class="d-flex justify-between items-center mt-6 mb-4">
                    <input type="text" class="form-control h-10 w-[200px] ml-auto mr-4" placeholder="pencarian" />
                    <button class="btn btn-primary">Tambah Daftar OPD</button>
                </div>

                <table class="table table-bordered table-striped w-full">
                    <thead class="table-light">
                        <tr class="text-semibold">
                            <th class="align-top">#</th>
                            <th class="align-top">Nama OPD</th>
                            <th class="align-top text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([
                            ['1', 'Perusda Rumah Potong Hewan'],
                            ['2', 'Perusda Terminal Makassar'],
                            ['3', 'BAGIAN PERENCANAAN dan KEUANGAN'],
                            ['4', 'Satuan Polisi Pamong Praja'],
                        ] as $opd)
                            <tr class="bg-white">
                                <td>{{ $opd[0] }}</td>
                                <td>{{ $opd[1] }}</td>
                                <td class="align-top font-normal">
                                    <div class="flex justify-center space-x-2">
                                        <a href="#" class="btn btn-sm">
                                            <img src="{{ asset('images/6.png') }}" alt="Pen" width="20" height="50">
                                        </a>
                                        <a href="#" class="btn btn-sm">
                                            <img src="{{ asset('images/5.png') }}" alt="Delete" width="20" height="20">
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
