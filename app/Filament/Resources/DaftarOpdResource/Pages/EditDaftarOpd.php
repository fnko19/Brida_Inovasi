<?php

namespace App\Filament\Resources\DaftarOpdResource\Pages;

use App\Filament\Resources\DaftarOpdResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarOpd extends EditRecord
{
    protected static string $resource = DaftarOpdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
