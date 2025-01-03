<?php

namespace App\Filament\Resources\Indikator8FileResource\Pages;

use App\Filament\Resources\Indikator8FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIndikator8Files extends ListRecords
{
    protected static string $resource = Indikator8FileResource::class;

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
