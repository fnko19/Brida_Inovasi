<?php

namespace App\Filament\Resources\Indikator5FileResource\Pages;

use App\Filament\Resources\Indikator5FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator5File extends EditRecord
{
    protected static string $resource = Indikator5FileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('back')
                ->label('Kembali')
                ->url(route('filament.admin.resources.inovasi-daerahs.index')),
        ];
    }
}