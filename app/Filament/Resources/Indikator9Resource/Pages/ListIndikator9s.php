<?php

namespace App\Filament\Resources\Indikator9Resource\Pages;

use App\Filament\Resources\Indikator9Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator9s extends ListRecords
{
    protected static string $resource = Indikator9Resource::class;

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
        $inovasiId = request()->query('inovasi9');
        if ($inovasiId) {
            $query->where('inovasi9_id', $inovasiId);
        }

        return $query;
    }
}
