<?php

namespace App\Filament\Resources\Indikator14Resource\Pages;

use App\Filament\Resources\Indikator14Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator14 extends EditRecord
{
    protected static string $resource = Indikator14Resource::class;

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
        $data['bobot14'] = match ($data['parameter14'] ?? null) {
            'Kurang dari sama dengan 50% atau Tidak ada pengaduan' => 1,
            '51% s.d 86%' => 2,
            'lebih dari sama dengan 86%' => 3,
            default => 0,
        };
    
        return $data;
    }
}
