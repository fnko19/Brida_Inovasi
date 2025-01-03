<?php

namespace App\Filament\Resources\Indikator15Resource\Pages;

use App\Filament\Resources\Indikator15Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator15s extends ListRecords
{
    protected static string $resource = Indikator15Resource::class;

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
        $inovasiId = request()->query('inovasi15');
        if ($inovasiId) {
            $query->where('inovasi15_id', $inovasiId);
        }

        return $query;
    }
}
