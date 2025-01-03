<?php

namespace App\Filament\Resources\Indikator17Resource\Pages;

use App\Filament\Resources\Indikator17Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator17 extends CreateRecord
{
    protected static string $resource = Indikator17Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot17'] = match ($data['parameter17'] ?? null) {
            'Inovasi dapat diciptakan dalam waktu 9 bulan atau lebih' => 2,
            'Inovasi dapat diciptakan dalam waktu 5-8 bulan' => 4,
            'Inovasi dapat diciptakan dalam waktu 1-4 bulan' => 6,
            default => 0,
        };
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
