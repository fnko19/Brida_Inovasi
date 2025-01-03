<?php

namespace App\Filament\Resources\Indikator2FileResource\Pages;

use App\Filament\Resources\Indikator2FileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator2File extends EditRecord
{
    protected static string $resource = Indikator2FileResource::class;

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
