<?php

namespace App\Filament\Resources\Indikator6FileResource\Pages;

use App\Filament\Resources\Indikator6FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator6File extends EditRecord
{
    protected static string $resource = Indikator6FileResource::class;

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
