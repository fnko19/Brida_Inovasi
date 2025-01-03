<?php

namespace App\Filament\Resources\Indikator19Resource\Pages;

use App\Filament\Resources\Indikator19Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator19 extends EditRecord
{
    protected static string $resource = Indikator19Resource::class;

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
        $data['bobot19'] = match ($data['parameter19'] ?? null) {
            'Hasil inovasi monev internal perangkat daerah' => 2,
            'Hasil pengukuran kepuasan pengguna dari evaluasi Survei Kepuasan Masyarakat' => 4,
            'Hasil laporan monev eksternal berdasarkan hasil penelitian/kajian/analisis' => 6,
            default => 0,
        };
    
        return $data;
    }
}
