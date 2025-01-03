<?php

namespace App\Filament\Resources\Indikator19Resource\Pages;

use App\Filament\Resources\Indikator19Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator19s extends ListRecords
{
    protected static string $resource = Indikator19Resource::class;

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
        $inovasiId = request()->query('inovasi19');
        if ($inovasiId) {
            $query->where('inovasi19_id', $inovasiId);
        }

        return $query;
    }
}
