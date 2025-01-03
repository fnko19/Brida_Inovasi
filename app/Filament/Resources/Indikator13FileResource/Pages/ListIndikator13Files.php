<?php

namespace App\Filament\Resources\Indikator13FileResource\Pages;

use App\Filament\Resources\Indikator13FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIndikator13Files extends ListRecords
{
    protected static string $resource = Indikator13FileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('back')
                ->label('Kembali')
                ->url(route('filament.admin.resources.inovasi-daerahs.index')),
        ];
    }
}
