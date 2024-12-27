<?php

namespace App\Filament\Resources\IndikatorProfilDaerahResource\Pages;

use App\Filament\Resources\IndikatorProfilDaerahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikatorProfilDaerah extends EditRecord
{
    protected static string $resource = IndikatorProfilDaerahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
