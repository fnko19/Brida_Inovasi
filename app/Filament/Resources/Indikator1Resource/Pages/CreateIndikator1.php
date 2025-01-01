<?php

namespace App\Filament\Resources\Indikator1Resource\Pages;

use App\Filament\Resources\Indikator1Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator1 extends CreateRecord
{
    protected static string $resource = Indikator1Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['bobot'] = match ($data['parameter'] ?? null) {
        'SK Kepala Perangkat Daerah' => 1,
        'SK Kepala Daerah' => 2,
        'Peraturan Kepala Daerah/Peraturan Daerah' => 3,
        default => 0,
    };

    //\Log::info('Data final sebelum create:', $data); // Debugging
    return $data;
}

}
