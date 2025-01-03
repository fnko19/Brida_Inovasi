<?php

namespace App\Filament\Resources\Indikator11FileResource\Pages;

use App\Filament\Resources\Indikator11FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIndikator11Files extends ListRecords
{
    protected static string $resource = Indikator11FileResource::class;

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
