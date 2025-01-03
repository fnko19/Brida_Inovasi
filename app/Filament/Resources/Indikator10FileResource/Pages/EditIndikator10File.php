<?php

namespace App\Filament\Resources\Indikator10FileResource\Pages;

use App\Filament\Resources\Indikator10FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator10File extends EditRecord
{
    protected static string $resource = Indikator10FileResource::class;

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
