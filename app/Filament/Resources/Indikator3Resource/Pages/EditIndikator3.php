<?php

namespace App\Filament\Resources\Indikator3Resource\Pages;

use App\Filament\Resources\Indikator3Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator3 extends EditRecord
{
    protected static string $resource = Indikator3Resource::class;

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
        $data['bobot3'] = match ($data['parameter3'] ?? null) {
            'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0 (Tahun Berjalan)' => 2,
            'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-1 atau T-2' => 4,
            'Anggaran dialokasikan pada kegiatan penerapan inovasi di T-0, T-1 dan T-3' => 6,
            default => 0,
        };
    
        return $data;
    }
}
