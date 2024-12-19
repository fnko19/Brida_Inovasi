@extends('layout.app')

@section('content')
    <div class="space-y-4 mt-8">
        <h1 class="text-2xl font-bold">
            FAQ
        </h1>
        <p class="text-gray-600">
            Berikut adalah beberapa pertanyaan yang sering diajukan di website BRIDA (Badan Riset dan Inovasi Daerah):
        </p>

        <!-- FAQ Section -->
        <div class="space-y-5">
            <!-- Question 1 -->
            <div class="bg-blue-50 min-w-full shadow-sm rounded-lg p-4 border">
                <h2 class="font-semibold text-lg text-gray-800">1. Apa itu BRIDA?</h2>
                <p class="text-gray-800 mt-2">
                    BRIDA (Badan Riset dan Inovasi Daerah) adalah badan yang bertugas untuk memfasilitasi, mendukung, dan mengembangkan riset serta inovasi di daerah guna mendukung pembangunan berbasis ilmu pengetahuan dan teknologi.
                </p>
            </div>

            <!-- Question 2 -->
            <div class="bg-blue-50 shadow-sm rounded-lg p-4 border">
                <h2 class="font-semibold text-lg text-gray-800">2. Bagaimana cara mengajukan inovasi di BRIDA?</h2>
                <p class="text-gray-800 mt-2">
                    Anda dapat mengajukan inovasi dengan mengunjungi <em>Inovasi Daerah</em> yang tersedia di website ini. Pastikan Anda telah mendaftarkan akun pengguna, mengisi formulir pengajuan inovasi, dan melampirkan dokumen pendukung sesuai format yang disyaratkan. Tim BRIDA akan melakukan peninjauan dan memberikan tanggapan dalam kurun waktu tertentu.
                </p>
            </div>

            <!-- Question 3 -->
            <div class="bg-blue-50 shadow-sm rounded-lg p-4 border">
                <h2 class="font-semibold text-lg text-gray-800">3. Apa saja program unggulan BRIDA?</h2>
                <p class="text-gray-800 mt-2">
                    Program unggulan BRIDA meliputi: 
                </p>
                <p class="text-gray-800 mt-2"> 
                    1. Pengembangan riset berbasis lokal.
                </p>
                <p class="text-gray-800 mt-2"> 
                    2. Peningkatan kapasitas inovasi UMKM.
                </p>
                <p class="text-gray-800 mt-2"> 
                    3. Kolaborasi riset dengan perguruan tinggi.
                </p>
            </div>
        </div>

        <!-- WhatsApp Support Section -->
        <div class="mt-6">
            <p class="text-gray-600 mb-4">
                Jika Anda memiliki pertanyaan lebih lanjut, klik tombol di bawah ini untuk menghubungi kami melalui WhatsApp.
            </p>

            <!-- WhatsApp Button -->
            <a href="https://wa.me/6282191190039?text=Halo%20Admin%20Saya%20butuh%20bantuan%20beberapa%20pertanyaan%20lain%20terkait%20BRIDA" target="_blank" class="inline-flex items-center px-4 py-2 font-semibold bg-blue-500 text-white rounded-lg shadow hover:bg-green-600 focus:outline-none">
                <i class="fas fa-whatsapp mr-2"></i> Hubungi Admin
            </a>
        </div>
    </div>
@endsection
