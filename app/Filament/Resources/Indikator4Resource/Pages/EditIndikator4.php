<?php

namespace App\Filament\Resources\Indikator4Resource\Pages;

use App\Filament\Resources\Indikator4Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator4 extends EditRecord
{
    protected static string $resource = Indikator4Resource::class;

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
        $data['bobot4'] = match ($data['parameter4'] ?? null) {
            'Pelaksanaan kerja secara manual/non elektronik' => 2,
            'Pelaksanaan kerja secara elektronik' => 4,
            'Pelaksanaan kerja sudah didukung sistem informasi online/daring' => 6,
            default => 0,
        };
    
        return $data;
    }
}
