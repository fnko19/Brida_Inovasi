<?php

namespace App\Filament\Resources\Indikator7Resource\Pages;

use App\Filament\Resources\Indikator7Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator7 extends CreateRecord
{
    protected static string $resource = Indikator7Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot7'] = match ($data['parameter7'] ?? null) {
            'Inovasi melibatkan 3 aktor'  => 1,
            'Inovasi melibatkan 4 aktor' => 2,
            'Inovasi melibatkan 5 aktor atau lebih' => 3,
            default => 0,
        };
    
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
