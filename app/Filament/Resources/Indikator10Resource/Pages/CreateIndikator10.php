<?php

namespace App\Filament\Resources\Indikator10Resource\Pages;

use App\Filament\Resources\Indikator10Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator10 extends CreateRecord
{
    protected static string $resource = Indikator10Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot10'] = match ($data['parameter10'] ?? null) {
            'Sosialisasi tatap muka baik secara langsung ataupun virtual (luring/during) atau sosialisasi menggunakan media fisik seperti pamflet, banner, baliho, pameran, dsb'  => 1,
            'Konten melalui media sosial' => 2,
            'Media berita' => 3,
            default => 0,
        };
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
