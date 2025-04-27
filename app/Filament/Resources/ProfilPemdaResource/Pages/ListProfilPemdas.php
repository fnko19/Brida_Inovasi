<?php

namespace App\Filament\Resources\ProfilPemdaResource\Pages;

use App\Filament\Resources\ProfilPemdaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfilPemdas extends ListRecords
{
    protected static string $resource = ProfilPemdaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
