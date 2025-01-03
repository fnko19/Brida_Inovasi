<?php

namespace App\Filament\Resources\Indikator8Resource\Pages;

use App\Filament\Resources\Indikator8Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator8 extends EditRecord
{
    protected static string $resource = Indikator8Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('back')
                ->label('Kembali')
                ->url(route('filament.admin.resources.inovasi-daerahs.index')),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['bobot8'] = match ($data['parameter8'] ?? null) {
            'Ada Pelaksana namun tidak ditetapkan dengan SK Kepala Perangkat Daerah'  => 1,
            'Ada pelaksana dan ditetapkan dengan SK Kepala Perangkat Daerah' => 2,
            'Ada Pelaksana dan ditetapkan dengan SK Kepala Daerah' => 3,
            default => 0,
        };
    
        return $data;
    }
}
