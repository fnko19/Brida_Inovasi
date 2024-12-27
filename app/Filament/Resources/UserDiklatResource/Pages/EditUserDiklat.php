<?php

namespace App\Filament\Resources\UserDiklatResource\Pages;

use App\Filament\Resources\UserDiklatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserDiklat extends EditRecord
{
    protected static string $resource = UserDiklatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
