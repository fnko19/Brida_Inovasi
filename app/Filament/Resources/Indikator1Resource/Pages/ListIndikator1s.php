<?php

namespace App\Filament\Resources\Indikator1Resource\Pages;

use App\Filament\Resources\Indikator1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;


class ListIndikator1s extends ListRecords
{
    protected static string $resource = Indikator1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTableQuery(): Builder
    {
        $query = parent::getTableQuery(); 
        $inovasiId = request()->query('inovasi');
        if ($inovasiId) {
            $query->where('inovasi_id', $inovasiId);
        }

        return $query;
    }
}
