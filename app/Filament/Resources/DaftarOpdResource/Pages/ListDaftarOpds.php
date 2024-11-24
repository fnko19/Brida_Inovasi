<?php

namespace App\Filament\Resources\DaftarOpdResource\Pages;

use App\Filament\Resources\DaftarOpdResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDaftarOpds extends ListRecords
{
    protected static string $resource = DaftarOpdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
