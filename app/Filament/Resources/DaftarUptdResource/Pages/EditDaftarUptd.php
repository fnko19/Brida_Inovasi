<?php

namespace App\Filament\Resources\DaftarUptdResource\Pages;

use App\Filament\Resources\DaftarUptdResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarUptd extends EditRecord
{
    protected static string $resource = DaftarUptdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
