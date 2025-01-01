<?php

namespace App\Filament\Resources\Indikator2Resource\Pages;

use App\Filament\Resources\Indikator2Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator2 extends CreateRecord
{
    protected static string $resource = Indikator2Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $data['bobot2'] = match ($data['parameter2'] ?? null) {
        '1-10 SDM' => 2,
        '11-30 SDM' => 4,
        'Lebih dari 30' => 6,
        default => 0,
    };

    //\Log::info('Data final sebelum create:', $data); // Debugging
    return $data;
}
}
