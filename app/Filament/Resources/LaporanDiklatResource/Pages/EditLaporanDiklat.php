<?php

namespace App\Filament\Resources\LaporanDiklatResource\Pages;

use App\Filament\Resources\LaporanDiklatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanDiklat extends EditRecord
{
    protected static string $resource = LaporanDiklatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
