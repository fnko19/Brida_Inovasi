<?php

namespace App\Filament\Resources\Indikator4Resource\Pages;

use App\Filament\Resources\Indikator4Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator4 extends CreateRecord
{
    protected static string $resource = Indikator4Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot4'] = match ($data['parameter4'] ?? null) {
            'Pelaksanaan kerja secara manual/non elektronik' => 2,
            'Pelaksanaan kerja secara elektronik' => 4,
            'Pelaksanaan kerja sudah didukung sistem informasi online/daring' => 6,
            default => 0,
        };
    
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
