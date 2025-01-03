<?php

namespace App\Filament\Resources\Indikator7Resource\Pages;

use App\Filament\Resources\Indikator7Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator7s extends ListRecords
{
    protected static string $resource = Indikator7Resource::class;

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
        $inovasiId = request()->query('inovasi7');
        if ($inovasiId) {
            $query->where('inovasi7_id', $inovasiId);
        }

        return $query;
    }
}
