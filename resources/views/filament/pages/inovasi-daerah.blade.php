@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
    <div class="space-y-4 mt-8">
        <h1 class="text-2xl font-bold pb-4">
            Inovasi Daerah
        </h1>
        <div class="pb-4 mb-2">
            <div class="bg-blue-50 min-w-full shadow-sm rounded-lg p-4 border">
                    <h2 class="font-semibold text-lg text-gray-800">Update Terakhir Pengukuran Mandiri Indeks Inovasi Daerah:</h2>
                    <p class="text-gray-800 mt-2">
                            25/11/2024 19:15 WITA
                    </p>
            </div>
        </div>    

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                <div class="bg-blue-200 p-4 flex space-x-4 rounded shadow-md">
                    <img src="{{ asset('images/a.png') }}" alt="inovasi daerah" class="w-14 h-14">
                    <div>
                        <h3 class="font-bold text-lg">Inovasi yang Dilaporkan</h3>
                        <p class="text-2xl font-bold">0</p>
                    </div>
                </div>
                <div class="bg-blue-200 flex space-x-4 p-4 rounded shadow-md">
                    <img src="{{ asset('images/b.png') }}" alt="inovasi daerah" class="w-14 h-14">
                    <div>
                        <h3 class="font-bold text-lg">Inovasi yang Dikirim</h3>
                        <p class="text-2xl font-bold">0</p>
                    </div>
                </div>
                <div class="bg-blue-200 p-4 flex space-x-4 rounded shadow-md">
                    <img src="{{ asset('images/c.png') }}" alt="inovasi daerah" class="w-14 h-14">
                    <div>
                        <h3 class="font-bold text-lg">Skor Jumlah Inovasi</h3>
                        <p class="text-2xl font-bold">0</p>
                    </div>
                </div>
                <div class="bg-blue-200 flex space-x-4 p-4 rounded shadow-md">
                    <img src="{{ asset('images/d.png') }}" alt="inovasi daerah" class="w-14 h-14">
                    <div>
                        <h3 class="font-bold text-lg">Inisiatif</h3>
                        <p class="text-2xl font-bold">0</p>
                    </div>
                </div>
                <div class="bg-blue-200 p-4 flex space-x-4 rounded shadow-md">
                    <img src="{{ asset('images/f.png') }}" alt="inovasi daerah" class="w-14 h-14">
                    <div>
                        <h3 class="font-bold text-lg">Uji Coba</h3>
                        <p class="text-2xl font-bold">0</p>
                    </div>
                </div>
                <div class="bg-blue-200 flex space-x-4 p-4 rounded shadow-md">
                    <img src="{{ asset('images/g.png') }}" alt="inovasi daerah" class="w-14 h-14">
                    <div>
                        <h3 class="font-bold text-lg">Penerapan</h3>
                        <p class="text-2xl font-bold">0</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-3">
                <button class="bg-blue-500 px-3 py-2 text-white font-semibold rounded-md">Unduh XLS</button>
            </div>

            <div class="mt-4">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: black;">Semua</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" style="color: blue;">Inisiatif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" style="color: blue;">Uji Coba</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" style="color: blue;">Penerapan</a>
                    </li>
                </ul>
            </div>


            <div class="card bg-blue-50 p-4">
                <div class="card-body">
                <div>
                <h4 class="font-bold text-lg">Kota Makassar</h4>
                
                <form class="mb-4 mt-2">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="bentukInovasi" class="form-label font-semibold">Bentuk Inovasi</label>
                            <select id="bentukInovasi" class="form-select">
                                <option selected>Select...</option>
                                <option value="1">Inovasi daerah lainnya sesuai dengan urusan pemerintah yang menjadi kewenangan daerah</option>
                                <option value="2">Inovasi pelayanan publik</option>
                                <option value="3">Inovasi tata kelola pemerintah daerah</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="jenisUrusan" class="form-label font-semibold">Jenis Urusan</label>
                            <select id="jenisUrusan" class="form-select">
                                <option selected>Select...</option>
                                <option value="1">Pendidikan</option>
                                <option value="2">Kesehatan</option>
                                <option value="3">Pekerjaan Umum dan Penataan Ruang</option>
                                <option value="4">Perumahan Rakyat dan Kawasan Pemukiman</option>
                                <option value="5">Ketentraman, Ketertiban Umum, dan Perlindungan Masyarakat</option>
                                <option value="6">Sosial</option>
                                <option value="7">Tenaga Kerja</option>
                                <option value="8">Pemberdayaan Perempuan dan Perlindungan Anak</option>
                                <option value="9">Pangan</option>
                                <option value="10">Pertahanan</option>
                                <option value="11">Lingkungan Hidup</option>
                                <option value="12">Administrasi Kependudukan dan Pencatatan Sipil</option>
                                <option value="13">Pemberdayaan Masyarakat dan Desa</option>
                                <option value="14">Pengendalian Penduduk dan Keluarga Berencana</option>
                                <option value="15">Perhubungan</option>
                                <option value="16">Komunikasi dan Informatika</option>
                                <option value="17">Koperasi, Usaha Kecil dan Menengah</option>
                                <option value="18">Penanaman Modal</option>
                                <option value="19">Kepemudaan dan Olahraga</option>
                                <option value="20">Statistik</option>
                                <option value="21">Persandian</option>
                                <option value="22">Kebudayaan</option>
                                <option value="23">Perpustakaan</option>
                                <option value="24">Kearsipan</option>
                                <option value="25">Kelautan dan Perikanan</option>
                                <option value="26">Pariwisata</option>
                                <option value="27">Pertanian</option>
                                <option value="28">Kehutanan</option>
                                <option value="29">Energi dan Sumber Daya Mineral</option>
                                <option value="30">Perdagangan</option>
                                <option value="31">Perindustrian</option>
                                <option value="32">Transmigrasi</option>
                                <option value="33">Perencanaan</option>
                                <option value="34">Keuangan</option>
                                <option value="35">Kepegawaian</option>
                                <option value="36">Pendidikan dan Pelatihan</option>
                                <option value="37">Penelitian dan Pengembangan</option>
                                <option value="38">Fungsi lain sesuai dengan Ketentuan Peraturan Perundang-undangan</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inisiator" class="form-label font-semibold">Inisiator</label>
                            <select id="inisiator" class="form-select">
                                <option selected>Select</option>
                                <option value="1">Kepala Daerah</option>
                                <option value="2">Anggota DPRD</option>
                                <option value="3">OPD</option>
                                <option value="4">ASN</option>
                                <option value="5">Masyarakat</option>
                            </select>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered table-striped w-full">
                    <thead class="table-light">
                        <tr>
                            <th class="align-top font-normal">#</th>
                            <th class="align-top font-normal">Nama Pemda</th>
                            <th class="align-top font-normal">Nama Inovasi*</th>
                            <th class="align-top font-normal">Tahapan Inovasi*</th>
                            <th class="align-top font-normal">Nama Inisiator*</th>
                            <th class="align-top font-normal">Urusan Pemerintahan Utama</th>
                            <th class="align-top font-normal">Waktu Uji Coba Inovasi Daerah*</th>
                            <th class="align-top font-normal">Waktu Penerapan Inovasi Daerah*</th>
                            <th class="align-top font-normal">Estimasi Skor Kematangan</th>
                            <th class="align-top font-normal">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-red-200">
                            <td class="align-top font-normal">1</td>
                            <td class="align-top font-normal">Kota Makassar</td>
                            <td class="align-top font-normal">Mari Berwakaf</td>
                            <td class="align-top font-normal">Penerapan</td>
                            <td class="align-top font-normal">Drs. Kaswadi</td>
                            <td class="align-top font-normal">pendidikan</td>
                            <td class="align-top font-normal">21/05/2022</td>
                            <td class="align-top font-normal">21/11/2023</td>
                            <td class="align-top font-normal">104.00</td>
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
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-green-200">
                            <td class="align-top font-normal">2</td>
                            <td class="align-top font-normal">Kota Makassar</td>
                            <td class="align-top font-normal">SABAR</td>
                            <td class="align-top font-normal">Penerapan</td>
                            <td class="align-top font-normal">Tim SABAR SDI Minasa Upa</td>
                            <td class="align-top font-normal">pendidikan</td>
                            <td class="align-top font-normal">15/04/2023</td>
                            <td class="align-top font-normal">01/05/2023</td>
                            <td class="align-top font-normal">109.00</td>
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
                                </div>
                            </td>
                        </tr>
                        <tr class="bg-green-200">
                            <td class="align-top font-normal">3</td>
                            <td class="align-top font-normal">Kota Makassar</td>
                            <td class="align-top font-normal">GA'DE-GA'DE PUSTAKA</td>
                            <td class="align-top font-normal">Penerapan</td>
                            <td class="align-top font-normal">Tulus Wulan Juni, S.Sos</td>
                            <td class="align-top font-normal">perpustakaan</td>
                            <td class="align-top font-normal">03/10/2021</td>
                            <td class="align-top font-normal">17/05/2022</td>
                            <td class="align-top font-normal">108.00</td>
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
                            <li class="page-item disabled"><a class="page-link" href="#">»</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>





    </div>
@endsection