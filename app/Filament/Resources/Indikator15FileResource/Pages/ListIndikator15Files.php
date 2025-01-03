<?php

namespace App\Filament\Resources\Indikator15FileResource\Pages;

use App\Filament\Resources\Indikator15FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIndikator15Files extends ListRecords
{
    protected static string $resource = Indikator15FileResource::class;

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
