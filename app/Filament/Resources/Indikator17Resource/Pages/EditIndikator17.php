<?php

namespace App\Filament\Resources\Indikator17Resource\Pages;

use App\Filament\Resources\Indikator17Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator17 extends EditRecord
{
    protected static string $resource = Indikator17Resource::class;

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
        $data['bobot17'] = match ($data['parameter17'] ?? null) {
            'Inovasi dapat diciptakan dalam waktu 9 bulan atau lebih' => 2,
            'Inovasi dapat diciptakan dalam waktu 5-8 bulan' => 4,
            'Inovasi dapat diciptakan dalam waktu 1-4 bulan' => 6,
            default => 0,
        };
    
        return $data;
    }
}
