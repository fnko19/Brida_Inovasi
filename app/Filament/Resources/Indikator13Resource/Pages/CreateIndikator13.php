<?php

namespace App\Filament\Resources\Indikator13Resource\Pages;

use App\Filament\Resources\Indikator13Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator13 extends CreateRecord
{
    protected static string $resource = Indikator13Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot13'] = match ($data['parameter13'] ?? null) {
            'Hasil inovasi diperoleh dalam waktu 6 hari atau lebih' => 2,
            'Hasil inovasi diperoleh dalam waktu 2-5 hari' => 4,
            'Hasil inovasi diperoleh dalam waktu 1 hari' => 6,
            default => 0,
        };
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
