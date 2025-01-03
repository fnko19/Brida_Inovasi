<?php

namespace App\Filament\Resources\Indikator5Resource\Pages;

use App\Filament\Resources\Indikator5Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator5s extends ListRecords
{
    protected static string $resource = Indikator5Resource::class;

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
        $inovasiId = request()->query('inovasi5');
        if ($inovasiId) {
            $query->where('inovasi5_id', $inovasiId);
        }

        return $query;
    }
}
