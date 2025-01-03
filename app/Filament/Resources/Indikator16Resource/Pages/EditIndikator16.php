<?php

namespace App\Filament\Resources\Indikator16Resource\Pages;

use App\Filament\Resources\Indikator16Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator16 extends EditRecord
{
    protected static string $resource = Indikator16Resource::class;

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
        $data['bobot16'] = match ($data['parameter16'] ?? null) {
            'Pernah 1 Kali direplikasi di daerah lain' => 3,
            'Pernah 2 Kali direplikasi di daerah lain' => 6,
            'Pernah 3 Kali direplikasi di daerah lain' => 9,
            default => 0,
        };
    
        return $data;
    }
}
