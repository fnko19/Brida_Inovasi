<?php

namespace App\Filament\Resources\Indikator10Resource\Pages;

use App\Filament\Resources\Indikator10Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator10s extends ListRecords
{
    protected static string $resource = Indikator10Resource::class;

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
        $inovasiId = request()->query('inovasi10');
        if ($inovasiId) {
            $query->where('inovasi10_id', $inovasiId);
        }

        return $query;
    }
}
