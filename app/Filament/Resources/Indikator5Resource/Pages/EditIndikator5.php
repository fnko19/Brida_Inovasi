<?php

namespace App\Filament\Resources\Indikator5Resource\Pages;

use App\Filament\Resources\Indikator5Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator5 extends EditRecord
{
    protected static string $resource = Indikator5Resource::class;

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
        $data['bobot5'] = match ($data['parameter5'] ?? null) {
            'Dalam 2 tahun terakhir pernah 1 kali kegiatan transfer pengetahuan (bimtek, sharing, FGB atau kegiatan transfer pengetahuan lain' => 1,
            'Dalam 2 tahun terakhir pernah 2 kali bimtek (bimtek, training dan TOT)' => 2,
            'Dalam 2 tahun terakhir pernah lebih dari 2 kali bimtek (bimtek, training dan TOT)' => 3,
            default => 0,
        };
    
        return $data;
    }
}
