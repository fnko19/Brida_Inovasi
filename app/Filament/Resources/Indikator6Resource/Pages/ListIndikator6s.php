<?php

namespace App\Filament\Resources\Indikator6Resource\Pages;

use App\Filament\Resources\Indikator6Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator6s extends ListRecords
{
    protected static string $resource = Indikator6Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('back')
                ->label('Kembali')
                ->url(route('filament.admin.resources.inovasi-daerahs.index')),
        ];
    }
    public function getTableQuery(): Builder
    {
        $query = parent::getTableQuery(); 
        $inovasiId = request()->query('inovasi6');
        if ($inovasiId) {
            $query->where('inovasi6_id', $inovasiId);
        }

        return $query;
    }

    
}
