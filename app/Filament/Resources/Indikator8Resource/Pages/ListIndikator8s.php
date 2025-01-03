<?php

namespace App\Filament\Resources\Indikator8Resource\Pages;

use App\Filament\Resources\Indikator8Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator8s extends ListRecords
{
    protected static string $resource = Indikator8Resource::class;

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
        $inovasiId = request()->query('inovasi8');
        if ($inovasiId) {
            $query->where('inovasi8_id', $inovasiId);
        }

        return $query;
    }
}
