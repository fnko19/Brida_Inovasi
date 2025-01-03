<?php

namespace App\Filament\Resources\Indikator4Resource\Pages;

use App\Filament\Resources\Indikator4Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator4s extends ListRecords
{
    protected static string $resource = Indikator4Resource::class;

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
        $inovasiId = request()->query('inovasi4');
        if ($inovasiId) {
            $query->where('inovasi4_id', $inovasiId);
        }

        return $query;
    }
}