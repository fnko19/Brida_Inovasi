<?php

namespace App\Filament\Resources\Indikator18FileResource\Pages;

use App\Filament\Resources\Indikator18FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator18File extends EditRecord
{
    protected static string $resource = Indikator18FileResource::class;

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
