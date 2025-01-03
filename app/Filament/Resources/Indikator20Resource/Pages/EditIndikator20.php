<?php

namespace App\Filament\Resources\Indikator20Resource\Pages;

use App\Filament\Resources\Indikator20Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator20 extends EditRecord
{
    protected static string $resource = Indikator20Resource::class;

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
        $data['bobot20'] = match ($data['parameter20'] ?? null) {
            'Memenuhi 1 atau 2 unsur substansi' => 4,
            'Memenuhi 3 atau 4 unsur substansi' => 8,
            'Memenuhi 5 unsur substansi' => 12,
            default => 0,
        };
    
        return $data;
    }
}
