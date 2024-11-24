<?php

namespace App\Filament\Resources\InovasiDaerahResource\Pages;

use App\Filament\Resources\InovasiDaerahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInovasiDaerahs extends ListRecords
{
    protected static string $resource = InovasiDaerahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
