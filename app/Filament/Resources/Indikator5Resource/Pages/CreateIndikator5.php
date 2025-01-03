<?php

namespace App\Filament\Resources\Indikator5Resource\Pages;

use App\Filament\Resources\Indikator5Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator5 extends CreateRecord
{
    protected static string $resource = Indikator5Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot5'] = match ($data['parameter5'] ?? null) {
            'Dalam 2 tahun terakhir pernah 1 kali kegiatan transfer pengetahuan (bimtek, sharing, FGB atau kegiatan transfer pengetahuan lain' => 1,
            'Dalam 2 tahun terakhir pernah 2 kali bimtek (bimtek, training dan TOT)' => 2,
            'Dalam 2 tahun terakhir pernah lebih dari 2 kali bimtek (bimtek, training dan TOT)' => 3,
            default => 0,
        };
    
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
