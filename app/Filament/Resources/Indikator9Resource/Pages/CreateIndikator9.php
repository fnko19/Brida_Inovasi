<?php

namespace App\Filament\Resources\Indikator9Resource\Pages;

use App\Filament\Resources\Indikator9Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator9 extends CreateRecord
{
    protected static string $resource = Indikator9Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot9'] = match ($data['parameter9'] ?? null) {
            'Inovasi melibatkan 1-2 Perangkat Daerah'  => 1,
            'Inovasi melibatkan 3-4 Perangkat Daerah' => 2,
            'Inovasi melibatkan 5 Perangkat Daerah atau lebih' => 3,
            default => 0,
        };
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
