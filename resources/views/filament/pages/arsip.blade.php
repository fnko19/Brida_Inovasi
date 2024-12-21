@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
    <div class="space-y-4 mt-8">
        <h1 class="text-2xl font-bold pb-4">
            Arsip
        </h1>
         

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
                <input type="text" class="form-control h-10 w-[250px] ml-auto" placeholder="pencarian" />
                </div>

                <table class="table table-bordered table-striped w-full">
                    <thead class="table-light">
                        <tr class="text-semibold">
                            <th class="align-top">#</th>
                            <th class="align-top">Nama Pemda</th>
                            <th class="align-top">Nama Inovasi</th>
                            <th class="align-top">Tahapan Inovasi</th>
                            <th class="align-top">Waktu Uji Coba Inovasi Daerah</th>
                            <th class="align-top">Waktu Penerapan Inovasi Daerah</th>
                            <th class="align-top">Kematangan </th>
                            <th class="align-top">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white">
                            <td>1</td>
                            <td>Kota Makassar</td>
                            <td>SIMDARS a.k.a SADARMA (Sistem Manajemen Data Retribusi Sampah Kecamatan Biringkanaya) (Lihat kembali RB, tujuan, hasil, lanjut ke indikator)</td>
                            <td>Penerapan</td>
                            <td>23/03/2021</td>
                            <td>23/04/2021</td>
                            <td>38.00</td>
                            <td class="align-top font-normal">
                                <div class="flex justify-center ">
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/1.png') }}" alt="Eye" width="24" height="24">
                                    </a>
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/2.png') }}" alt="Pakta Integritas" width="24" height="24">
                                    </a>
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/3.png') }}" alt="Unduk Dokumen"width="24" height="24">
                                    </a>
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/4.png') }}" alt="Unduh XLS" width="24" height="24">
                                    </a>
                                    <a href="#" class="btn btn-sm">
                                        <img src="{{ asset('images/5.png') }}" alt="Delete" width="24" height="24">
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-white">
                            <td>2</td>
                            <td>Kota MakassarI</td>
                            <td>BUNTING SALEWANGANG (PENGANTIN SEHAT)</td>
                            <td>Penerapan</td>
                            <td>23/03/2021</td>
                            <td>27/05/2021</td>
                            <td>97.00</td>
                            <td class="align-top font-normal">
                                <div class="flex justify-center ">
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
                            <td>3</td>
                            <td>Kota Makassar</td>
                            <td>TEKAD (Tingkatkan Edukasi Kemandirian Anak Disabilitas)</td>
                            <td>Penerapan</td>
                            <td>01/01/2020</td>
                            <td>01/02/2021</td>
                            <td>107.00</td>
                            <td class="align-top font-normal">
                                <div class="flex justify-center ">
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
                            <td>4</td>
                            <td>Kota Makassar</td>
                            <td>"SAPAH Kecamatan Tallo" kepanjangan ? lihat lagi rancang bangunnya,, tujuan, manfaat, dan hasil,,</td>
                            <td>Penerapan</td>
                            <td>09/02/2021</td>
                            <td>15/03/2021</td>
                            <td>0</td>
                            <td class="align-top font-normal">
                                <div class="flex justify-center ">
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
