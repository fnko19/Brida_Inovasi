<?php

namespace App\Filament\Resources\Indikator14FileResource\Pages;

use App\Filament\Resources\Indikator14FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator14File extends EditRecord
{
    protected static string $resource = Indikator14FileResource::class;

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
