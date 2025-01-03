<?php

namespace App\Filament\Resources\Indikator7FileResource\Pages;

use App\Filament\Resources\Indikator7FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator7File extends EditRecord
{
    protected static string $resource = Indikator7FileResource::class;

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
