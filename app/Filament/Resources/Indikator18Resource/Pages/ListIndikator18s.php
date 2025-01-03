<?php

namespace App\Filament\Resources\Indikator18Resource\Pages;

use App\Filament\Resources\Indikator18Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator18s extends ListRecords
{
    protected static string $resource = Indikator18Resource::class;

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
        $inovasiId = request()->query('inovasi17');
        if ($inovasiId) {
            $query->where('inovasi17_id', $inovasiId);
        }

        return $query;
    }
}