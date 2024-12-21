@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
    <div class="space-y-4 mt-8">
        <h1 class="text-2xl font-bold pb-4">
            Inovasi Pemerintah Daerah
        </h1>
        <div class="pb-4 mb-2">
            <div class="bg-blue-50 min-w-full shadow-sm rounded-lg p-4 border">
                    <h2 class="font-semibold text-lg text-gray-800">Harap diperhatikan!</h2>
                    <p class="text-gray-800 mt-2">
                        Lomba Inovasi Daerah ini digunakan hanya untuk penyelenggaraan Penilaian inovasi di Tingkat Daerah masing-masing.
                    </p>
            </div>
        </div>    

            <div class="flex justify-end pt-3">
                <button class="bg-blue-500 px-3 py-2 text-white font-semibold rounded-md">Unduh XLS</button>
            </div>

            <div class="mt-4">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Semua</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inisiatif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Uji Coba</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Penerapan</a>
                    </li>
                </ul>
            </div>

            <div class="card bg-blue-50 p-4">
                <div class="card-body">
                <h4 class="font-bold text-lg">Kota Makassar</h4>
                
                <div class="d-flex justify-content-between align-items-center mt-6 mb-4">
                    <input type="text" class="form-control w-25" placeholder="pencarian" />
                    <button class="btn btn-primary">Tambah Inovasi Pemerintah Daerah</button>
                </div>

                <table class="table table-bordered table-striped w-full">
                    <thead class="table-light">
                        <tr class="text-semibold">
                            <th class="align-top">#</th>
                            <th class="align-top">Dibuat Oleh</th>
                            <th class="align-top">Nama Inovasi</th>
                            <th class="align-top">Tahapan Inovasi</th>
                            <th class="align-top">Urusan Pemerintahan Utama</th>
                            <th class="align-top">Waktu Uji Coba Inovasi Daerah</th>
                            <th class="align-top">Waktu Penerapan Inovasi Daerah</th>
                            <th class="align-top">Kematangan </th>
                            <th class="align-top">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white">
                            <td>1</td>
                            <td>UPT SPF SDN BULUROKENG</td>
                            <td>"LEKO' SIPAMULA"</td>
                            <td>Penerapan</td>
                            <td>lingkungan hidup</td>
                            <td>01/10/2024</td>
                            <td>29/10/2024</td>
                            <td>12.00</td>
                            <td class="align-top font-normal">
                                <div class="flex justify-center space-x-2">
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/1.png') }}" alt="Eye" width="20" height="20">
                                    </a>
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/2.png') }}" alt="Pakta Integritas" width="20" height="20">
                                    </a>
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/3.png') }}" alt="Unduk Dokumen" width="20" height="20">
                                    </a>
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/4.png') }}" alt="Unduh XLS" width="20" height="20">
                                    </a>
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/5.png') }}" alt="Delete" width="20" height="20">
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-white">
                            <td>2</td>
                            <td>Nurul Hikmah NR., S.Pd.I., M.Pd.I</td>
                            <td>GIBA SPRIN (Gizi Seimbang Isi Piringku)</td>
                            <td>Penerapan</td>
                            <td>pendidikan</td>
                            <td>03/07/2023</td>
                            <td>07/08/2023</td>
                            <td>0</td>
                            <td class="align-top font-normal">
                                <div class="flex justify-center space-x-2">
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/1.png') }}" alt="Eye" width="20" height="20">
                                    </a>
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/2.png') }}" alt="Pakta Integritas" width="20" height="20">
                                    </a>
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/3.png') }}" alt="Unduk Dokumen" width="20" height="20">
                                    </a>
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/4.png') }}" alt="Unduh XLS" width="20" height="20">
                                    </a>
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/5.png') }}" alt="Delete" width="20" height="20">
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