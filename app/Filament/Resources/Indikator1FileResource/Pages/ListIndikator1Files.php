<?php

namespace App\Filament\Resources\Indikator1FileResource\Pages;

use App\Filament\Resources\Indikator1FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator1Files extends ListRecords
{
    protected static string $resource = Indikator1FileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

}
