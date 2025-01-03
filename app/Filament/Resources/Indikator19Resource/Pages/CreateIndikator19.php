<?php

namespace App\Filament\Resources\Indikator19Resource\Pages;

use App\Filament\Resources\Indikator19Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator19 extends CreateRecord
{
    protected static string $resource = Indikator19Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot19'] = match ($data['parameter19'] ?? null) {
            'Hasil inovasi monev internal perangkat daerah' => 2,
            'Hasil pengukuran kepuasan pengguna dari evaluasi Survei Kepuasan Masyarakat' => 4,
            'Hasil laporan monev eksternal berdasarkan hasil penelitian/kajian/analisis' => 6,
            default => 0,
        };
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
