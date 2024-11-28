<x-filament::page>
    <div class="space-y-6">
        <h2 class="text-xl font-bold">Akses API</h2>
        
        <div>
            <label class="block font-medium text-gray-700">API KEY</label>
            <div class="mt-1 bg-gray-100 border rounded-lg px-4 py-2">
                {{ $apiKey }}
            </div>
        </div>
        
        <div>
            <label class="block font-medium text-gray-700">API SECRET</label>
            <div class="mt-1 bg-gray-100 border rounded-lg px-4 py-2">
                {{ $apiSecret }}
            </div>
        </div>
        
        <div class="mt-6">
            <h3 class="text-lg font-semibold">Petunjuk Penggunaan</h3>
            <p class="text-gray-600">
                Silahkan gunakan API Key di atas untuk dapat mengakses REST API Indeks Inovasi.
            </p>
        </div>

        <div>
            <label class="block font-medium text-gray-700">API Endpoint</label>
            <div class="mt-1 bg-gray-100 border rounded-lg px-4 py-2">
                {{ $apiEndpoint }}
            </div>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold">Referensi API</h3>         
        </div>

        <div>
            <label class="block font-medium text-gray-700">ACCESS TOKEN</label>
            <div class="mt-1 bg-gray-100 border rounded-lg px-4 py-2">
                {{ $accessToken }}
            </div>
        </div>

        <div class="mt-6">
            <p class="text-gray-800 mb-2 ">
                Parameter:
            </p>
            <p class="text-gray-800 mb-4">
            |Nama|Type|Keterangan| |key|String|Api Key anda| |secret|String|API Secret anda|
            </p>
            <p class="text-gray-800 mb-2">
                Response:
            </p>
            <div class="bg-gray-100 border rounded-lg px-4 py-2 mb-4">
                <pre>
{
  "status":1,
  "token":2c513f149e737ec4063fc1d37aee9beabc4b4bbf
}
                </pre>
            </div>
        </div>

    </div>
</x-filament::page>

