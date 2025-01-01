<?php

namespace App\Filament\Resources\Indikator3Resource\Pages;

use App\Filament\Resources\Indikator3Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator3s extends ListRecords
{
    protected static string $resource = Indikator3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTableQuery(): Builder
    {
        $query = parent::getTableQuery(); 
        $inovasiId = request()->query('inovasi3');
        if ($inovasiId) {
            $query->where('inovasi3_id', $inovasiId);
        }

        return $query;
    }

    
}
