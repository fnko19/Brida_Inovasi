<?php

namespace App\Filament\Resources\Indikator19FileResource\Pages;

use App\Filament\Resources\Indikator19FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator19File extends EditRecord
{
    protected static string $resource = Indikator19FileResource::class;

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
