<?php

namespace App\Filament\Resources\Indikator16Resource\Pages;

use App\Filament\Resources\Indikator16Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator16 extends CreateRecord
{
    protected static string $resource = Indikator16Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot16'] = match ($data['parameter16'] ?? null) {
            'Pernah 1 Kali direplikasi di daerah lain' => 3,
            'Pernah 2 Kali direplikasi di daerah lain' => 6,
            'Pernah 3 Kali direplikasi di daerah lain' => 9,
            default => 0,
        };
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
