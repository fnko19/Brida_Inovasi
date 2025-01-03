<?php

namespace App\Filament\Resources\Indikator10Resource\Pages;

use App\Filament\Resources\Indikator10Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator10 extends EditRecord
{
    protected static string $resource = Indikator10Resource::class;

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
        $data['bobot10'] = match ($data['parameter10'] ?? null) {
            'Sosialisasi tatap muka baik secara langsung ataupun virtual (luring/during) atau sosialisasi menggunakan media fisik seperti pamflet, banner, baliho, pameran, dsb'  => 1,
            'Konten melalui media sosial' => 2,
            'Media berita' => 3,
            default => 0,
        };
    
        return $data;
    }
}
