<?php

namespace App\Filament\Resources\Indikator4FileResource\Pages;

use App\Filament\Resources\Indikator4FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator4Files extends ListRecords
{
    protected static string $resource = Indikator4FileResource::class;

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
