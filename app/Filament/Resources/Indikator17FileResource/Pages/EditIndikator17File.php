<?php

namespace App\Filament\Resources\Indikator17FileResource\Pages;

use App\Filament\Resources\Indikator17FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator17File extends EditRecord
{
    protected static string $resource = Indikator17FileResource::class;

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
