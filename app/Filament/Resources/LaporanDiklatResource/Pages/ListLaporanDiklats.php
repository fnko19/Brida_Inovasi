<?php

namespace App\Filament\Resources\LaporanDiklatResource\Pages;

use App\Filament\Resources\LaporanDiklatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporanDiklats extends ListRecords
{
    protected static string $resource = LaporanDiklatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
