<?php

namespace App\Filament\Resources\Indikator18Resource\Pages;

use App\Filament\Resources\Indikator18Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator18 extends CreateRecord
{
    protected static string $resource = Indikator18Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot18'] = match ($data['parameter18'] ?? null) {
            'Tidak dapat diukur' => 0,
            'Jumlah pengguna atau penerima manfaat 1-100 orang' => 3,
            'Jumlah pengguna atau penerima manfaat 101-200 orang' => 6,
            'Jumlah pengguna atau penerima manfaat 201 orang atau lebih' => 9,
            'Persentase peningkatan jumlah unit 5,00% - 20,00%' => 3,
            'Persentase peningkatan jumlah unit 20,01% - 50,00%' => 6,
            'Persentase peningkatan jumlah unit > 50%' => 9,
            'Efisiensi belanja sebesar 0,01% - 10,00%' => 3,
            'Efisiensi belanja sebesar 10,01% - 20,00%' => 6,
            'Efisiensi belanja sebesar 20,01% - 30,00%' => 9,
            'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 0,01%-49,99%' => 3,
            'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi 50,00%-99,99%' => 6,
            'Pendapatan bagi pemda atau perangkat daerah atau unit kerja yang menerapkan inovasi lebih dari sama dengan 100%' => 9,
            'Jumlah produk yang dihasilkan atau diperjualbelikan 1-100 barang' => 3,
            'Jumlah produk yang dihasilkan atau diperjualbelikan 101-200 barang' => 6,
            'Jumlah produk yang dihasilkan atau diperjualbelikan lebih dari 200 barang' => 9,
            default => 0,
        };
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
