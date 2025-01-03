<?php

namespace App\Filament\Resources\Indikator11FileResource\Pages;

use App\Filament\Resources\Indikator11FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator11File extends EditRecord
{
    protected static string $resource = Indikator11FileResource::class;

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
