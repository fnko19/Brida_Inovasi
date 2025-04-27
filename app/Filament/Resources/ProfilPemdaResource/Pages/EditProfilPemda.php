<?php

namespace App\Filament\Resources\ProfilPemdaResource\Pages;

use App\Filament\Resources\ProfilPemdaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfilPemda extends EditRecord
{
    protected static string $resource = ProfilPemdaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
