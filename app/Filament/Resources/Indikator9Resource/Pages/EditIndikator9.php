<?php

namespace App\Filament\Resources\Indikator9Resource\Pages;

use App\Filament\Resources\Indikator9Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator9 extends EditRecord
{
    protected static string $resource = Indikator9Resource::class;

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
        $data['bobot9'] = match ($data['parameter9'] ?? null) {
            'Inovasi melibatkan 1-2 Perangkat Daerah'  => 1,
            'Inovasi melibatkan 3-4 Perangkat Daerah' => 2,
            'Inovasi melibatkan 5 Perangkat Daerah atau lebih' => 3,
            default => 0,
        };
    
        return $data;
    }
}
