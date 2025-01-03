<?php

namespace App\Filament\Resources\Indikator14Resource\Pages;

use App\Filament\Resources\Indikator14Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator14 extends CreateRecord
{
    protected static string $resource = Indikator14Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot14'] = match ($data['parameter14'] ?? null) {
            'Kurang dari sama dengan 50% atau Tidak ada pengaduan' => 1,
            '51% s.d 86%' => 2,
            'lebih dari sama dengan 86%' => 3,
            default => 0,
        };
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
