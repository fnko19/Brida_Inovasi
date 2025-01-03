<?php

namespace App\Filament\Resources\Indikator13Resource\Pages;

use App\Filament\Resources\Indikator13Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator13s extends ListRecords
{
    protected static string $resource = Indikator13Resource::class;

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
        $inovasiId = request()->query('inovasi13');
        if ($inovasiId) {
            $query->where('inovasi13_id', $inovasiId);
        }

        return $query;
    }
}
