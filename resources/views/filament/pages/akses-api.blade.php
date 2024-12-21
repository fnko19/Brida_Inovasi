@extends('layout.app') 

@section('title', 'Inovasi BRIDA Kota Makassar')

@section('content')
<div class="py-6">
    <div class="space-y-8">
        <!-- Judul Halaman -->
        <h2 class="text-2xl font-bold">Akses API</h2>
        
        <!-- API KEY -->
        <div>
            <label class="block font-medium text-gray-700">API KEY</label>
            <div class="mt-1 bg-blue-50 border rounded-lg px-4 py-2">
                f2851b1944cc7400aeda4dc57029a6915273ce28
            </div>
        </div>
        
        <!-- API SECRET -->
        <div>
            <label class="block font-medium text-gray-700">API SECRET</label>
            <div class="mt-1 bg-blue-50 border rounded-lg px-4 py-2">
                f737b923042c3d8a5e6b70d1ff3dc70b1d5c7b13
            </div>
        </div>
        
        <!-- Petunjuk Penggunaan -->
        <div class="mt-6">
            <h3 class="text-lg pb-2 font-semibold">Petunjuk Penggunaan</h3>
            <p class="text-gray-600">
                Silahkan gunakan API Key di atas untuk dapat mengakses REST API Indeks Inovasi.
            </p>
        </div>

        <!-- API Endpoint -->
        <div>
            <label class="block font-medium text-gray-700">API Endpoint</label>
            <div class="mt-1 bg-blue-50 border rounded-lg px-4 py-2">
                https://api.indeks.inovasi.litbang.kemendagri.go.id
            </div>
        </div>

        <!-- Referensi API -->
        <div class="mt-6">
            <h3 class="text-lg font-semibold">Referensi API</h3>         
        </div>

        <!-- ACCESS TOKEN -->
        <div>
            <label class="block font-medium text-gray-700">ACCESS TOKEN</label>
            <div class="mt-1 bg-blue-50 border rounded-lg px-4 py-2">
                GET /api/token?key=axcassadlkasjdklasd&secret=1234567
            </div>
        </div>

        <!-- Parameter dan Response -->
        <div class="mt-6">
            <p class="text-gray-800 mb-2">
                Parameter:
            </p>
            <p class="text-gray-600 mb-4">
                | Nama | Type | Keterangan |  
                | key | String |Api Key anda | 
                 secret | String | API Secret anda |
            </p>
            <p class="text-gray-800 mb-2">
                Response:
            </p>
            <div class="bg-blue-50 border rounded-lg px-4 pt-2">
                <pre>
{
  "status":1,
  "token":"2c513f149e737ec4063fc1d37aee9beabc4b4bbf"
}
                </pre>
            </div>
        </div>

    </div>
</div>
@endsection
