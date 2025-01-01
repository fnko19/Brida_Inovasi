<?php

namespace App\Filament\Resources\Indikator2Resource\Pages;

use App\Filament\Resources\Indikator2Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator2 extends EditRecord
{
    protected static string $resource = Indikator2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
{
    $data['bobot2'] = match ($data['parameter2'] ?? null) {
        '1-10 SDM' => 2,
        '11-30 SDM' => 4,
        'Lebih dari 30' => 6,
        default => 0,
    };

    return $data;
}
}
