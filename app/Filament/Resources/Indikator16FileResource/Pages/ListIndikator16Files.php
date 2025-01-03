<?php

namespace App\Filament\Resources\Indikator16FileResource\Pages;

use App\Filament\Resources\Indikator16FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIndikator16Files extends ListRecords
{
    protected static string $resource = Indikator16FileResource::class;

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
