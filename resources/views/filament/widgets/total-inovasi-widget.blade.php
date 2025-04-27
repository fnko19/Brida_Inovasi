<x-filament::widget>
    <x-filament::card>

        {{-- Judul Utama --}}
        @if (!$opd_name && !$uptd_name)
            <div class="mt-4 mb-6 text-xl font-extrabold text-gray-800">
                Daftar Inovasi OPD dan UPTD
            </div>
        @endif

        {{-- Daftar Semua OPD --}}
        <div class="mt-6">
            <h4 class="text-lg font-bold text-gray-700 border-b pb-2">
                Daftar Semua OPD
            </h4>
            <ul class="mt-4 space-y-2">
                @foreach ($allOpds as $index => $opd)
                    <li class="flex justify-between text-gray-600">
                        <span>{{ $index + 1 }}. {{ $opd['nama_opd'] }}</span>
                        <span class="font-medium text-gray-800">{{ $opd['jumlah_inovasi'] }} inovasi</span>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Daftar Semua UPTD --}}
        <div class="mt-6">
            <h4 class="text-lg font-bold text-gray-700 border-b pb-2">
                Daftar Semua UPTD
            </h4>
            <ul class="mt-4 space-y-2">
                @foreach ($allUptds as $index => $uptd)
                    <li class="flex justify-between text-gray-600">
                        <span>{{ $index + 1 }}. {{ $uptd['nama_uptd'] }}</span>
                        <span class="font-medium text-gray-800">{{ $uptd['jumlah_inovasi'] }} inovasi</span>
                    </li>
                @endforeach
            </ul>
        </div>

    </x-filament::card>
</x-filament::widget>
