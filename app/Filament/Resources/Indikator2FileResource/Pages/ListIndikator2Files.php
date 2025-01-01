<?php

namespace App\Filament\Resources\Indikator2FileResource\Pages;

use App\Filament\Resources\Indikator2FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIndikator2Files extends ListRecords
{
    protected static string $resource = Indikator2FileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
