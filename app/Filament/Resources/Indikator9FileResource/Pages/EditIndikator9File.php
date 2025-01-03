<?php

namespace App\Filament\Resources\Indikator9FileResource\Pages;

use App\Filament\Resources\Indikator9FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator9File extends EditRecord
{
    protected static string $resource = Indikator9FileResource::class;

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
