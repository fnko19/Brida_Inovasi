<?php

namespace App\Filament\Resources\Indikator6Resource\Pages;

use App\Filament\Resources\Indikator6Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator6 extends CreateRecord
{
    protected static string $resource = Indikator6Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot6'] = match ($data['parameter6'] ?? null) {
            'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 atau T-2' => 2,
            'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 dan T-2' => 4,
            'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1, T-2 dan T0 (T0 adalah Tahun Berjalan)' => 6,
            default => 0,
        };
    
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
