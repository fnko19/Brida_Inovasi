<?php

namespace App\Filament\Resources\Indikator12FileResource\Pages;

use App\Filament\Resources\Indikator12FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIndikator12Files extends ListRecords
{
    protected static string $resource = Indikator12FileResource::class;

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
