<?php

namespace App\Filament\Resources\Indikator3Resource\Pages;

use App\Filament\Resources\Indikator3Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator3 extends CreateRecord
{
    protected static string $resource = Indikator3Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot3'] = match ($data['parameter3'] ?? null) {
            'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0 (Tahun Berjalan)' => 2,
            'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-1 atau T-2' => 4,
            'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0, T-1 dan T-3' => 6,
            default => 0,
        };
    
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
