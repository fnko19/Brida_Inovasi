<?php

namespace App\Filament\Resources\IndikatorProfilDaerahResource\Pages;

use App\Filament\Resources\IndikatorProfilDaerahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIndikatorProfilDaerahs extends ListRecords
{
    protected static string $resource = IndikatorProfilDaerahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
