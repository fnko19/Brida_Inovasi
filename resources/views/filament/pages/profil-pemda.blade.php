@extends('layout.app')

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
<div class="space-y-4 py-2">
    <h1 class="text-xl font-bold pb-4">Profil Pemda Kota Makassar</h1>

    <div class="bg-red-100 shadow-sm rounded-lg p-4 border">
        <!-- Kontainer Profil Pemda -->
        <div id="profil-pemda-container" class="space-y-6"></div>
    </div>

    <div>
    <h1 class="text-xl font-bold pt-6 pb-4">Indikator</h1>
    <div class="shadow-sm rounded-lg border">
        <div class="overflow-auto"> <!-- Tambahkan div pembungkus dengan overflow -->
            <table id="indikator-table" class="table-auto w-full bg-red-50 border-collapse border-2 border-white min-w-[600px]">
                <thead>
                    <tr>
                        <th class="border text-center bg-red-700 text-white border-white p-2">No</th>
                        <th class="border text-center bg-red-700 text-white border-white p-2">Indikator SPD</th>
                        <th class="border text-center bg-red-700 text-white border-white p-2">Informasi</th>
                        <th class="border text-center bg-red-700 text-white border-white p-2">Dokumen Pendukung</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data akan dimasukkan di sini -->
                </tbody>
            </table>
        </div>
    </div>
</div>


    <script>
    // Fetch data Profil Pemda
    fetch('/api/profil-pemda')
        .then(response => response.json())
        .then(data => {
            const container = document.querySelector('#profil-pemda-container');

            data.forEach(item => {
                const profileBlock = document.createElement('div');
                profileBlock.className = 'space-y-2';

                profileBlock.innerHTML = `
                    <div><strong>Tingkatan:</strong><br>${item.tingkatan}</div>
                    <div><strong>OPD yang Menangani:</strong><br>${item.opd_yang_menangani}</div>
                    <div><strong>Alamat:</strong><br>${item.alamat}</div>
                    <div><strong>Email:</strong><br>${item.email}</div>
                    <div><strong>Nomor Telepon:</strong><br>${item.no_telp}</div>
                    <div><strong>Nama Admin:</strong><br>${item.admin}</div>
                    <div class="pb-4"><br>
                        <button onclick="window.location.href='/profil-pemda/download-pakta/${item.id}'" class="text-white bg-red-700 border-red-700 py-2 px-4 rounded">
                            Download Pakta Integritas
                        </button>
                    </div>
                `;

                container.appendChild(profileBlock);
            });
        })
        .catch(error => console.error('Error fetching data:', error));

        // Fetch data indikator
        fetch('/api/indikator')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#indikator-table tbody');

                if (!data || data.length === 0) {
                    tableBody.innerHTML = `
                        <tr>
                            <td colspan="4" class="text-center p-4">Tidak ada data indikator yang tersedia.</td>
                        </tr>
                    `;
                    return;
                }

                tableBody.innerHTML = '';
                data.forEach((item, index) => {
                    const dokumenCell = `
                        <button
                            class="text-red-700 underline"
                            onclick="fetchDokumen(${item.id})">
                            Lihat Dokumen
                        </button>
                    `;

                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="border border-red-300 p-2 text-center">${index + 1}</td>
                        <td class="border border-red-300 p-2">${item.nama_indikator}</td>
                        <td class="border border-red-300 p-2">${item.informasi.replace(/\n/g, '<br>')}</td>
                        <td class="border border-red-300 p-2 text-center">${dokumenCell}</td>
                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error fetching indikator:', error);
                alert('Belum ada data pendukung');
            });

        // Fungsi untuk mengambil dan menampilkan dokumen
        function fetchDokumen(indikatorId) {
            fetch(`/api/dokumen-indikator/${indikatorId}`)
                .then(response => response.json())
                .then(dokumenData => {
                    if (!dokumenData || dokumenData.length === 0) {
                        showModal('Dokumen Indikator', `Tidak ada dokumen pendukung untuk indikator ini.`);
                        return;
                    }

                    const dokumenList = dokumenData.map(d => `
                        <div style="margin-bottom: 10px; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                            <p><strong>Nomor Surat:</strong> ${d.nomor_surat}</p>
                            <p><strong>Tanggal Surat:</strong> ${d.tgl_surat}</p>
                            <p><strong>Tentang:</strong> ${d.tentang}</p>
                            <p><a href="${d.file_url}" target="_blank" style="color: red; text-decoration: underline;">Lihat Dokumen</a></p>
                        </div>
                    `).join('');

                    showModal('Dokumen Indikator', dokumenList);
                })
                .catch(error => {
                    console.error('Error fetching dokumen:', error);
                    showModal('Error', 'Belum ada dokumen pendukung');
                });
        }

        // Fungsi untuk menampilkan modal
        function showModal(title, content) {
            const modalHTML = `
                <div id="dokumen-modal" class="modal" style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center; z-index: 1000;">
                    <div style="background: white; padding: 20px; border-radius: 8px; max-width: 600px; width: 100%;">
                        <h2 style="font-weight: bold; margin-bottom: 10px;">${title}</h2>
                        <div>${content}</div>
                        <button id="close-modal" style="margin-top: 10px; padding: 10px 15px; background: #E22411; color: white; border: none; border-radius: 5px;">Tutup</button>
                    </div>
                </div>
            `;

            document.body.insertAdjacentHTML('beforeend', modalHTML);

            document.querySelector('#close-modal').addEventListener('click', () => {
                document.querySelector('#dokumen-modal').remove();
            });
        }
    </script>
</div>
@endsection
