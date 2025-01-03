<?php

namespace App\Filament\Resources\Indikator2Resource\Pages;

use App\Filament\Resources\Indikator2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator2s extends ListRecords
{
    protected static string $resource = Indikator2Resource::class;

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
        $inovasiId = request()->query('inovasi2');
        if ($inovasiId) {
            $query->where('inovasi2_id', $inovasiId);
        }

        return $query;
    }
}
