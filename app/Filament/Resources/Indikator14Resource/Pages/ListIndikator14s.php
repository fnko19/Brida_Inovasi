<?php

namespace App\Filament\Resources\Indikator14Resource\Pages;

use App\Filament\Resources\Indikator14Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator14s extends ListRecords
{
    protected static string $resource = Indikator14Resource::class;

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
        $inovasiId = request()->query('inovasi14');
        if ($inovasiId) {
            $query->where('inovasi14_id', $inovasiId);
        }

        return $query;
    }
}
