@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
<div class="space-y-4 mt-8">
    <h1 class="text-2xl font-bold pb-4">
        Konfigurasi Akun
    </h1>

    <div class="flex justify-between items-center mt-6 mb-4">
        <div class="flex items-center space-x-4">
            <input type="text" class="form-control w-[200px]" placeholder="Cari email" id="searchEmail" />

            <button class="bg-red-700 text-white px-4 py-2 font-semibold rounded hover:bg-red-500 focus:outline-none" id="searchBtn">
                Cari
            </button>
        </div>
    </div>

    <div class="card bg-red-100 p-4 mt-6">
        <div class="card-body overflow-x-auto">
            <table class="table table-bordered table-striped w-full">
                <thead class="bg-red-700 text-white ">
                    <tr class="text-semibold">
                        <th class="align-top">#</th>
                        <th class="align-top">Role</th>
                        <th class="align-top">Fungsi</th>
                        <th class="align-top">Kecamatan</th> <!-- Daerah -->
                        <th class="align-top">OPD</th> <!-- OPD -->
                        <th class="align-top">Email</th>
                    </tr>
                </thead>
                <tbody id="akunList" class="bg-white">
                    @foreach($users as $user)
                    <tr id="user-{{ $user->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->role_diklat }}</td>
                        <td>{{ $user->function }}</td>
                        <td>{{ $user->kecamatan }}</td>
                        <td>{{ $user->opdss ? $user->opdss->nama_opd : 'N/A' }}</td> 
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.getElementById('searchBtn').addEventListener('click', function () {
        const searchQuery = document.getElementById('searchEmail').value;

        if (searchQuery.trim() !== '') {
            // Pastikan URL dibentuk dengan benar
            const searchUrl = '{{ route('searchAkun') }}?email=' + encodeURIComponent(searchQuery);

            console.log('Fetching URL:', searchUrl); // Tambahkan untuk debugging

            fetch(searchUrl)
                .then(response => response.json())
                .then(data => {
                    const akunList = document.getElementById('akunList');
                    akunList.innerHTML = ''; // Clear tabel yang ada

                    if (data.length > 0) {
                        // Menangani hasil pencarian
                        data.forEach((user, index) => {
                            const row = document.createElement('tr');
                            row.innerHTML = 
                                `<td>${index + 1}</td>
                                <td>${user.role_diklat}</td>
                                <td>${user.function}</td>
                                <td>${user.kecamatan ?? 'N/A'}</td>
                                <td>${user.opdss ? user.opdss.nama_opd : 'N/A'}</td> <!-- Ambil nama OPD dari relasi -->
                                <td>${user.email}</td>`;
                            akunList.appendChild(row);
                        });
                    } else {
                        akunList.innerHTML = '<tr><td colspan="6" class="text-center">Tidak ada hasil ditemukan</td></tr>';
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            alert('Harap masukkan email untuk pencarian');
        }
    });
</script>
@endsection