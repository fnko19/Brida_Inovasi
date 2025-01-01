<?php

namespace App\Filament\Resources\Indikator1Resource\Pages;

use App\Filament\Resources\Indikator1Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator1 extends EditRecord
{
    protected static string $resource = Indikator1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
{
    $data['bobot'] = match ($data['parameter'] ?? null) {
        'SK Kepala Perangkat Daerah' => 1,
        'SK Kepala Daerah' => 2,
        'Peraturan Kepala Daerah/Peraturan Daerah' => 3,
        default => 0,
    };

    return $data;
}
}
