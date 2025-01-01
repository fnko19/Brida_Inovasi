<?php

namespace App\Filament\Resources\Indikator1FileResource\Pages;

use App\Filament\Resources\Indikator1FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator1File extends EditRecord
{
    protected static string $resource = Indikator1FileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
