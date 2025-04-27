@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
    <div class="space-y-4 py-2">
        <h1 class="text-xl font-bold pb-6">Data Diklat</h1>
            <div class="pb-4">
                <div class="card bg-red-100 p-2">
                    <div class="card-body">
                        <div class="flex flex-col space-y-4">
                            <div class="w-full">
                                <label for="pelatihan" class="form-label font-semibold">Jenis Pelatihan</label>
                                <select name="pelatihan" id="pelatihan" 
                                    class="form-select bg-white w-full max-w-[400px] md:w-[400px] p-2 border rounded-md" 
                                    onchange="filterTable()">
                                    <option value="">Pilih</option>
                                    <option value="1">Pelatihan Kepemimpinan Pengawas (PKP)</option>
                                    <option value="2">Pelatihan Kepemimpinan Administrator (PKA)</option>
                                    <option value="3">Pelatihan Kepemimpinan Nasional II (PKN II)</option>
                                    <option value="4">Pelatihan Kepemimpinan Nasional I (PKN I)</option>
                                    <option value="5">Pelatihan Dasar CPNS</option>
                                    <option value="6">Pelatihan Kepemimpinan Non-Structural</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="card mt-6">
            <div class="card-body">
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-separate text-center" id="diklatTable">
                        <thead class="bg-red-700 text-white">
                            <tr>
                                <th class="px-4 py-2 border-b">#</th>
                                <th class="px-4 py-2 border-b">Nama</th>
                                <th class="px-4 py-2 border-b">NIP</th>
                                <th class="px-4 py-2 border-b">Instansi</th>
                                <th class="px-4 py-2 border-b">Jenis Pelatihan</th>
                                <th class="px-4 py-2 border-b">Judul Pelatihan</th>
                                <th class="px-4 py-2 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporanDiklat as $index => $diklat)
                                <tr class="bg-red-50" data-jenis-pelatihan="{{ $diklat->jenis_pelatihan }}">
                                    <td class="px-4 py-2 border-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 border-2">{{ $diklat->nama }}</td>
                                    <td class="px-4 py-2 border-2">{{ $diklat->nip }}</td>
                                    <td class="px-4 py-2 border-2">{{ $diklat->instansi }}</td>
                                    <td class="px-4 py-2 border-2" id="pelatihan-{{ $diklat->id }}">
                                    
                                    </td>
                                    <td class="px-4 py-2 border-2">{{ $diklat->judul_pelatihan }}</td>
                                    <td class="px-4 py-2 border-2">
                                        <div class="flex justify-center space-x-2 ">
                                          
                                            <a href="{{ route('data-laporan-diklat.edit', $diklat->id) }}" class="text-blue-600 hover:text-blue-800">
                                                <img src="{{ asset('images/6.png') }}" alt="Pen" width="20" height="20">
                                            </a>
  
                                            <a href="javascript:void(0);" class="text-red-600 hover:text-red-800" onclick="openDeleteModal({{ $diklat->id }})">
                                                <img src="{{ asset('images/5.png') }}" alt="Delete" width="20" height="20">
                                            </a>

                                            <form id="delete-form-{{ $diklat->id }}" action="{{ route('data-laporan-diklat.destroy', $diklat->id) }}" method="POST" class="hidden">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <div id="deleteModal-{{ $diklat->id }}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                                                <div class="bg-white p-6 rounded-lg w-96">
                                                    <h3 class="text-xl font-semibold mb-4">Konfirmasi Penghapusan</h3>
                                                    <p class="mb-4">Apakah Anda yakin ingin menghapus data ini?</p>
                                                    <div class="flex justify-end space-x-4">
                                                        <button type="button" class="px-4 py-2 bg-gray-300 text-black rounded" onclick="closeDeleteModal({{ $diklat->id }})">Batal</button>
                                                        <button type="button" class="px-4 py-2 bg-red-600 text-white rounded" onclick="confirmDelete({{ $diklat->id }})">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk memfilter tabel -->
    <script>
        const pelatihanNames = {
            '1': 'Pelatihan Kepemimpinan Pengawas (PKP)',
            '2': 'Pelatihan Kepemimpinan Administrator (PKA)',
            '3': 'Pelatihan Kepemimpinan Nasional II (PKN II)',
            '4': 'Pelatihan Kepemimpinan Nasional I (PKN I)',
            '5': 'Pelatihan Dasar CPNS',
            '6': 'Pelatihan Kepemimpinan Non-Structural'
        };

        // Tampilkan nama pelatihan di tabel
        document.querySelectorAll('#diklatTable tbody tr').forEach(function(row) {
            const jenisPelatihan = row.getAttribute('data-jenis-pelatihan');
            const pelatihanCell = row.querySelector('td[id^="pelatihan-"]');
            pelatihanCell.textContent = pelatihanNames[jenisPelatihan];
        });

        function filterTable() {
            var selectedValue = document.getElementById('pelatihan').value;
            var rows = document.querySelectorAll('#diklatTable tbody tr');

            rows.forEach(function(row) {
                var jenisPelatihan = row.getAttribute('data-jenis-pelatihan');
                if (selectedValue === "" || selectedValue == jenisPelatihan) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        function openDeleteModal(id) {
            document.getElementById('deleteModal-' + id).classList.remove('hidden');
        }

        function closeDeleteModal(id) {
            document.getElementById('deleteModal-' + id).classList.add('hidden');
        }

        function confirmDelete(id) {
            document.getElementById('delete-form-' + id).submit();
        }
    </script>
@endsection