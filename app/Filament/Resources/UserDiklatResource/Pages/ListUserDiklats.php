<?php

namespace App\Filament\Resources\UserDiklatResource\Pages;

use App\Filament\Resources\UserDiklatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListUserDiklats extends ListRecords
{
    protected static string $resource = UserDiklatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->where('role_diklat', 'peserta diklat');
    }

}
