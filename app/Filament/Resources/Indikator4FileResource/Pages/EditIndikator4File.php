<?php

namespace App\Filament\Resources\Indikator4FileResource\Pages;

use App\Filament\Resources\Indikator4FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator4File extends EditRecord
{
    protected static string $resource = Indikator4FileResource::class;

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
