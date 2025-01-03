<?php

namespace App\Filament\Resources\Indikator16Resource\Pages;

use App\Filament\Resources\Indikator16Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListIndikator16s extends ListRecords
{
    protected static string $resource = Indikator16Resource::class;

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
        $inovasiId = request()->query('inovasi16');
        if ($inovasiId) {
            $query->where('inovasi16_id', $inovasiId);
        }

        return $query;
    }
}
