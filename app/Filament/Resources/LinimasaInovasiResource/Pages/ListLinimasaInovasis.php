<?php

namespace App\Filament\Resources\LinimasaInovasiResource\Pages;

use App\Filament\Resources\LinimasaInovasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListLinimasaInovasis extends ListRecords
{
    protected static string $resource = LinimasaInovasiResource::class;

    protected function getTableQuery(): Builder
    {
        // Menampilkan data yang sudah ada, bisa disesuaikan dengan query atau sorting tertentu
        return parent::getTableQuery();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
