<?php

namespace App\Filament\Resources\Indikator20FileResource\Pages;

use App\Filament\Resources\Indikator20FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIndikator20Files extends ListRecords
{
    protected static string $resource = Indikator20FileResource::class;

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
