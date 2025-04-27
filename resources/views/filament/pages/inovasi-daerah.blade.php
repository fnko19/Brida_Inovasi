@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
    <div class="space-y-4 py-2">
        <h1 class="text-xl font-bold pb-4">
            Inovasi Daerah
        </h1> 
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
            <div class="bg-red-200 p-4 flex space-x-4 rounded shadow-md">
                <img src="{{ asset('images/a.png') }}" alt="inovasi daerah" class="w-14 h-14">
                <div>
                    <h3 class="font-bold">Inovasi yang Dilaporkan</h3>
                    <p class="text-2xl font-bold">{{ $inovasiYangDilaporkan }}</p>
                </div>
            </div>
            <div class="bg-red-200 p-4 flex space-x-4 rounded shadow-md">
                <img src="{{ asset('images/b.png') }}" alt="inovasi daerah" class="w-14 h-14">
                <div>
                    <h3 class="font-bold">Inovasi yang Dikirim</h3>
                    <p class="text-2xl font-bold">{{ $inovasiYangDikirim }}</p>
                </div>
            </div>
            <div class="bg-red-200 p-4 flex space-x-4 rounded shadow-md">
                <img src="{{ asset('images/c.png') }}" alt="inovasi daerah" class="w-14 h-14">
                <div>
                    <h3 class="font-bold">Skor Jumlah Inovasi</h3>
                    <p class="text-2xl font-bold">{{ $skorJumlahInovasi }}</p>
                </div>
            </div>
            <div class="bg-red-200 p-4 flex space-x-4 rounded shadow-md">
                <img src="{{ asset('images/d.png') }}" alt="inovasi daerah" class="w-14 h-14">
                <div>
                    <h3 class="font-bold">Inisiatif</h3>
                    <p class="text-2xl font-bold">{{ $inisiatif }}</p>
                </div>
            </div>
            <div class="bg-red-200 p-4 flex space-x-4 rounded shadow-md">
                <img src="{{ asset('images/f.png') }}" alt="inovasi daerah" class="w-14 h-14">
                <div>
                    <h3 class="font-bold">Uji Coba</h3>
                    <p class="text-2xl font-bold">{{ $ujiCoba }}</p>
                </div>
            </div>
            <div class="bg-red-200 p-4 flex space-x-4 rounded shadow-md">
                <img src="{{ asset('images/g.png') }}" alt="inovasi daerah" class="w-14 h-14">
                <div>
                    <h3 class="font-bold">Penerapan</h3>
                    <p class="text-2xl font-bold">{{ $penerapan }}</p>
                </div>
            </div>
        </div>

        <div class="flex justify-end pt-8 pb-4">
            <a href="{{ route('excelInovasi') }}" class="bg-red-700 px-3 py-1 text-sm text-white font-semibold rounded-md">
                Unduh XLS
            </a>
        </div>


        <div class="card bg-red-100 p-4">
            <div class="card-body">
                <h4 class="font-bold text-lg pb-2">Kota Makassar</h4>

                <div class="flex items-center space-x-4 pb-4">
                    <label for="filterTahapan" class="text-sm font-semibold">Tahapan Inovasi</label>
                    <select id="filterTahapan" class="bg-white text-sm rounded-md px-2 py-1">
                        <option value="">Semua</option>
                        <option value="Inisiatif">Inisiatif</option>
                        <option value="Uji_Coba">Uji Coba</option>
                        <option value="Penerapan">Penerapan</option>
                    </select>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-6 bg-red-700 py-1 text-left text-sm font-semibold">Nama Inovasi</th>
                                <th class="px-6 bg-red-700 py-1 text-left text-sm font-semibold">Tahapan Inovasi</th>
                                <th class="px-6 bg-red-700 py-1 text-left text-sm font-semibold">Nama Inisiator</th>
                                <th class="px-6 bg-red-700 py-1 text-left text-sm font-semibold">Urusan Pemerintah Utama</th>
                                <th class="px-6 bg-red-700 py-1 text-left text-sm font-semibold">Waktu Uji Coba Inovasi Daerah</th>
                                <th class="px-6 bg-red-700 py-1 text-left text-sm font-semibold">Waktu Penerapan Inovasi Daerah</th>
                                <th class="px-6 bg-red-700 py-1 text-left text-sm font-semibold">Estimasi Skor Kematangan</th>
                                <th class="px-12 bg-red-700 py-1 text-center text-sm font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="inovasiList" class="divide-y divide-gray-200">
                            <!-- Data will be populated here -->
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <script>
            const urusanUtamaMapping = {
                '1': 'Pendidikan',
                '2': 'Kesehatan',
                '3': 'Pekerjaan Umum dan Penataan Ruang',
                '4': 'Perumahan Rakyat dan Kawasan Pemukiman',
                '5': 'Ketentraman, Ketertiban Umum, dan Perlindungan Masyarakat',
                '6': 'Sosial',
                '7': 'Tenaga Kerja',
                '8': 'Pemberdayaan Perempuan dan Perlindungan Anak',
                '9': 'Pangan',
                '10': 'Pertahanan',
                '11': 'Lingkungan Hidup',
                '12': 'Administrasi Kependudukan dan Pencatatan Sipil',
                '13': 'Pemberdayaan Masyarakat dan Desa',
                '14': 'Pengendalian Penduduk dan Keluarga Berencana',
                '15': 'Perhubungan',
                '16': 'Komunikasi dan Informatika',
                '17': 'Koperasi, Usaha Kecil dan Menengah',
                '18': 'Penanaman Modal',
                '19': 'Kepemudaan dan Olahraga',
                '20': 'Statistik',
                '21': 'Persandian',
                '22': 'Kebudayaan',
                '23': 'Perpustakaan',
                '24': 'Kearsipan',
                '25': 'Kelautan dan Perikanan',
                '26': 'Pariwisata',
                '27': 'Pertanian',
                '28': 'Kehutanan',
                '29': 'Energi dan Sumber Daya Mineral',
                '30': 'Perdagangan',
                '31': 'Perindustrian',
                '32': 'Transmigrasi',
                '33': 'Perencanaan',
                '34': 'Keuangan',
                '35': 'Kepegawaian',
                '36': 'Pendidikan dan Pelatihan',
                '37': 'Penelitian dan Pengembangan',
                '38': 'Fungsi lain sesuai dengan Ketentuan Peraturan Perundang-undangan',
            };

            document.getElementById('filterTahapan').addEventListener('change', function () {
                const selectedTahapan = this.value;
                fetchInovasiData(selectedTahapan);
            });

            function fetchInovasiData(tahapan = '') {
                let url = tahapan 
                    ? `http://localhost:8000/api/inovasi-daerah?${new URLSearchParams({ tahapan })}`
                    : 'http://localhost:8000/api/inovasi-daerah';

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        const listElement = document.getElementById('inovasiList');

                        // Clear existing content
                        listElement.innerHTML = '';

                        // Loop through the fetched inovasi data
                        data.forEach(inovasi => {
                            console.log(inovasi); // Check data in the console
                            
                            // Mapping to government affairs
                            const urusanUtama = urusanUtamaMapping[inovasi.urusan_utama] || 'N/A';

                            // Create a table row element for each inovasi
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td class="px-6 py-2 text-sm text-gray-900">${inovasi.nama_inovasi}</td>
                                <td class="px-6 py-2 text-sm text-gray-900">${inovasi.tahapan_inovasi}</td>
                                <td class="px-6 py-2 text-sm text-gray-900">${inovasi.nama_inisiator}</td>
                                <td class="px-6 py-2 text-sm text-gray-900">${urusanUtama}</td>
                                <td class="px-6 py-2 text-sm text-gray-900">${inovasi.waktu_uji || 'N/A'}</td>
                                <td class="px-6 py-2 text-sm text-gray-900">${inovasi.waktu_penerapan || 'N/A'}</td>
                                <td class="px-6 py-2 text-sm text-gray-900" id="skorKematangan-${inovasi.id}">
                                    0
                                </td>
                                <td class="text-center py-4 flex justify-center items-center">
                                    <a href="http://localhost:8000/api/download-pdf/${inovasi.id}" target="_blank" class="btn btn-sm" title="Download PDF">
                                        <img src="{{ asset('images/2.png') }}" class="w-5 h-5" alt="Download PDF">
                                    </a>
                                    <!-- Button to download document -->
                                    <a href="http://localhost:8000/api/export-excel/${inovasi.id}" target="_blank" class="btn btn-sm" title="Download Excel">
                                        <img src="{{ asset('images/4.png') }}" alt="Download Document" class="w-5 h-5">
                                    </a>
                                    <a href="http://localhost:8000/export-excel/${inovasi.id}" target="_blank" class="btn btn-sm" title="Download Repor Inovasi">
                                        <img src="{{ asset('images/7.png') }}" alt="Download Rapor Inovasi" class="w-5 h-5">
                                    </a>
                                </td>
                            `;
                            listElement.appendChild(row);

                            // Fetching skor kematangan for each inovasi
                            fetch(`http://localhost:8000/api/inovasi-daerah/${inovasi.id}/skor-kematangan`)
                                .then(response => response.json())
                                .then(skorData => {
                                    const skorKematanganElement = document.getElementById(`skorKematangan-${inovasi.id}`);
                                    // Update the skor kematangan if available
                                    skorKematanganElement.textContent = skorData.skor_kematangan || '0';
                                })
                                .catch(error => {
                                    console.error('Error fetching skor kematangan:', error);
                                    const skorKematanganElement = document.getElementById(`skorKematangan-${inovasi.id}`);
                                    skorKematanganElement.textContent = 'N/A';
                                });
                        });
                    })
                    .catch(error => console.error('Error fetching inovasi data:', error));
            }

            // Initial data load
            fetchInovasiData();

        </script>
    </div>
@endsection
