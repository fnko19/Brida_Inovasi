<?php

namespace App\Filament\Resources\Indikator5FileResource\Pages;

use App\Filament\Resources\Indikator5FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator5Files extends ListRecords
{
    protected static string $resource = Indikator5FileResource::class;

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
