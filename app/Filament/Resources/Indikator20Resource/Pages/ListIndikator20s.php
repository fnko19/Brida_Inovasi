<?php

namespace App\Filament\Resources\Indikator20Resource\Pages;

use App\Filament\Resources\Indikator20Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator20s extends ListRecords
{
    protected static string $resource = Indikator20Resource::class;

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
        $inovasiId = request()->query('inovasi20');
        if ($inovasiId) {
            $query->where('inovasi20_id', $inovasiId);
        }

        return $query;
    }
}
