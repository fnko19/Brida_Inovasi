<?php

namespace App\Filament\Resources\Indikator12Resource\Pages;

use App\Filament\Resources\Indikator12Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator12 extends EditRecord
{
    protected static string $resource = Indikator12Resource::class;

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
        $data['bobot12'] = match ($data['parameter12'] ?? null) {
            'Informasi layanan diperoleh melalui 1 dari 4 metode' => 1,
            'Informasi layanan diperoleh melalui 2 dari 4 metode' => 2,
            'Informasi layanan diperoleh melalui 3 atau lebih metode' => 3,
            default => 0,
        };
    
        return $data;
    }
}
