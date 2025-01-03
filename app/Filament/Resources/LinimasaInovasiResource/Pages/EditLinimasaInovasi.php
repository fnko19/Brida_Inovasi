<?php

namespace App\Filament\Resources\LinimasaInovasiResource\Pages;

use App\Filament\Resources\LinimasaInovasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLinimasaInovasi extends EditRecord
{
    protected static string $resource = LinimasaInovasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
