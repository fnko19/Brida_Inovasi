<?php

namespace App\Filament\Resources\Indikator15Resource\Pages;

use App\Filament\Resources\Indikator15Resource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIndikator15 extends CreateRecord
{
    protected static string $resource = Indikator15Resource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['bobot15'] = match ($data['parameter15'] ?? null) {
            'Tidak dapat diukur' => 0,
            'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang berjalan secara terpisah' => 2,
            'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang terintegrasi dalam satu portal pada unit organisasi yang bersangkutan' => 4,
            'Ada dukungan melalui informasi website/sosial media/web aplikasi/ aplikasi mobile(android/ios) yang layanan sudah terintegrasi dengan unit organisasi lain' => 6,
            'Layanan inovasi berjalan secara tersendiri (independen)' => 2,
            'Layanan masih terintegrasi dengan layanan lain pada program atau kegiatan lain pada satu unit organisasi atau dalam satu urusan pemerintahan' => 4,
            'Layanan masih terintegrasi dengan layanan lain pada program atau kegiatan lain pada unit organisasi lain atau dalam lebih dari satu urusan pemerintahan' => 6,
            default => 0,
        };
        //\Log::info('Data final sebelum create:', $data); // Debugging
        return $data;
    }
}
