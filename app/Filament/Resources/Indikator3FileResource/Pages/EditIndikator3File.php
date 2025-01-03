<?php

namespace App\Filament\Resources\Indikator3FileResource\Pages;

use App\Filament\Resources\Indikator3FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator3File extends EditRecord
{
    protected static string $resource = Indikator3FileResource::class;

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
