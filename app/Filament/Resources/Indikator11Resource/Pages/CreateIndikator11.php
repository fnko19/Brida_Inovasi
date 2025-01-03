<?php

namespace App\Filament\Resources\Indikator11Resource\Pages;

use App\Filament\Resources\Indikator11Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator11 extends CreateRecord
{
    protected static string $resource = Indikator11Resource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot11'] = match ($data['parameter11'] ?? null) {
            'Telah terdapat Pedoman teknis berupa buku manual' => 1,
            'Telah terdapat Pedoman teknis berupa buku dalam bentuk elektronik' => 2,
            'Telah terdapat Pedoman teknis berupa buku yang dapat diakses secara online atau berupa video tutorial' => 3,
            default => 0,
        };
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
