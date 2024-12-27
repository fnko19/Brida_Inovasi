<?php

namespace App\Filament\Resources\DokumenIndikatorResource\Pages;

use App\Filament\Resources\DokumenIndikatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDokumenIndikators extends ListRecords
{
    protected static string $resource = DokumenIndikatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
