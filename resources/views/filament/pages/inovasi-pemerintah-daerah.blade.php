@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div class="space-y-4 py-2">
        <h1 class="text-xl font-bold pb-4">
            Inovasi Pemerintah Daerah
        </h1>
        <div class="pb-4 mb-2">
            <div class="bg-red-100 min-w-full shadow-sm rounded-lg p-4 border">
                    <h2 class="font-semibold text-lg text-gray-800">Harap diperhatikan!</h2>
                    <p class="text-gray-800 mt-2">
                        <!-- Lomba Inovasi Daerah ini digunakan hanya untuk penyelenggaraan Penilaian inovasi di Tingkat Daerah masing-masing. -->
                        Login ke halaman Admin untuk menambahkan inovasi!
                    </p>
            </div>
        </div>    

        <div class="flex justify-end pt-3">
            <a href="{{ route('excelPemerintah') }}" class="bg-red-700 px-3 py-1 text-sm text-white font-semibold rounded-md">
                Unduh XLS
            </a>
        </div>


            <div class="card bg-red-100 p-4">
                <div class="card-body">
                <h4 class="font-bold text-lg">Kota Makassar</h4>
                
                <div class="d-flex justify-between items-center space-x-4 mt-6 mb-3">
                    <div class="flex-1">
                        <div class="flex items-center space-x-4 pb-2">
                            <label for="filterTahapan" class="text-sm font-semibold">Tahapan Inovasi</label>
                            <select id="filterTahapan" class="bg-white text-sm rounded-md px-2 py-1">
                                <option value="">Semua</option>
                                <option value="Inisiatif">Inisiatif</option>
                                <option value="Uji_Coba">Uji Coba</option>
                                <option value="Penerapan">Penerapan</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex-1 text-right">
                        <form action="http://127.0.0.1:8000/admin" method="get">
                            <button type="submit" class="btn bg-red-700 hover:bg-red-500 text-white text-sm font-semibold w-full sm:w-auto">
                                Tambah Inovasi
                            </button>
                        </form>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-6 py-1 text-left bg-red-700 text-sm font-semibold">Dibuat Oleh</th>
                                <th class="px-6 py-1 text-left bg-red-700 text-sm font-semibold">Nama Inovasi</th>
                                <th class="px-6 py-1 text-left bg-red-700 text-sm font-semibold">Tahapan Inovasi</th>
                                <th class="px-6 py-1 text-left bg-red-700 text-sm font-semibold">Urusan Pemerintah Utama</th>
                                <th class="px-6 py-1 text-left bg-red-700 text-sm font-semibold">Waktu Uji Coba Inovasi Daerah</th>
                                <th class="px-6 py-1 text-left bg-red-700 text-sm font-semibold">Waktu Penerapan Inovasi Daerah</th>
                                <th class="px-6 py-1 text-left bg-red-700 text-sm font-semibold">Skor Kematangan</th>
                                <th class="px-6 py-1 text-center bg-red-700 text-sm font-semibold">Actions</th>
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

                        // Clear any existing content in the list
                        listElement.innerHTML = '';

                        // Loop through the data and create a table row for each entry
                        data.forEach(inovasi => {
                            const row = document.createElement('tr');

                            // Pemetaan urusan utama
                            const urusanUtama = urusanUtamaMapping[inovasi.urusan_utama] || 'N/A';

                    row.innerHTML = `
                        <td class="px-6 py-2 text-sm text-gray-900">${inovasi.dibuat_oleh}</td>
                        <td class="px-6 py-2 text-sm text-gray-900">${inovasi.nama_inovasi}</td>
                        <td class="px-6 py-2 text-sm text-gray-900">${inovasi.tahapan_inovasi}</td>
                        <td class="px-6 py-2 text-sm text-gray-900">${urusanUtama}</td>
                        <td class="px-6 py-2 text-sm text-gray-900">${inovasi.waktu_uji || 'N/A'}</td>
                        <td class="px-6 py-2 text-sm text-gray-900">${inovasi.waktu_penerapan || 'N/A'}</td>
                        <td class="px-6 py-2 text-sm text-gray-900" id="skorKematangan-${inovasi.id}">
                            0
                        </td>
                        <td class="text-center">
                            <div style="display: inline-flex; align-items: center; ">
                                <!-- Button to view details -->
                                <a href="http://localhost:8000/api/download-pdf/${inovasi.id}" target="_blank" class="btn btn-sm" title="Download PDF">
                                    <img src="{{ asset('images/2.png') }}" alt="Download PDF" width="28" height="28">
                                </a>
                                <!-- Button to download document -->
                                <a href="http://localhost:8000/api/export-excel/${inovasi.id}" target="_blank" class="btn btn-sm" title="Download Excel">
                                    <img src="{{ asset('images/4.png') }}" alt="Download Document" width="28" height="28">
                                </a>
                                <!-- Button to delete -->
                                <button class="btn btn-sm" title="Hapus" onclick="openDeleteModal(${inovasi.id})">
                                    <img src="{{ asset('images/5.png') }}" alt="Delete" width="28" height="28">
                                </button>

                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-bold" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                Apakah Anda yakin ingin menghapus inovasi ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>`;

                    listElement.appendChild(row);

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

    fetchInovasiData();

    let deleteId = null;

    function openDeleteModal(id) {
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    const confirmButton = document.getElementById('confirmDelete');

    confirmButton.onclick = function () {
        deleteInovasi(id);
        modal.hide();
    };

    modal.show();
    }

    function deleteInovasi(id) {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`http://localhost:8000/api/inovasi-daerah/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
            },
        })
        .then(response => {
            if (response.ok) {
                fetchInovasiData(); // Refresh data
            } else {
                alert('Gagal menghapus inovasi');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    </script>
    </div>
@endsection