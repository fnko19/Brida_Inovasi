<?php

namespace App\Filament\Resources\Indikator11Resource\Pages;

use App\Filament\Resources\Indikator11Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator11s extends ListRecords
{
    protected static string $resource = Indikator11Resource::class;

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
        $inovasiId = request()->query('inovasi11');
        if ($inovasiId) {
            $query->where('inovasi11_id', $inovasiId);
        }

        return $query;
    }
}
