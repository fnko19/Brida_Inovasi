<?php

namespace App\Filament\Resources\Indikator3FileResource\Pages;

use App\Filament\Resources\Indikator3FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIndikator3Files extends ListRecords
{
    protected static string $resource = Indikator3FileResource::class;

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
