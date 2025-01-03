<?php

namespace App\Filament\Resources\Indikator12Resource\Pages;

use App\Filament\Resources\Indikator12Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator12s extends ListRecords
{
    protected static string $resource = Indikator12Resource::class;

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
        $inovasiId = request()->query('inovasi12');
        if ($inovasiId) {
            $query->where('inovasi12_id', $inovasiId);
        }

        return $query;
    }
}
