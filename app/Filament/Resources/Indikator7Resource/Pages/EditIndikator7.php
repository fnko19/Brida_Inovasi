<?php

namespace App\Filament\Resources\Indikator7Resource\Pages;

use App\Filament\Resources\Indikator7Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator7 extends EditRecord
{
    protected static string $resource = Indikator7Resource::class;

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
        $data['bobot7'] = match ($data['parameter7'] ?? null) {
            'Inovasi melibatkan 3 aktor'  => 1,
            'Inovasi melibatkan 4 aktor' => 2,
            'Inovasi melibatkan 5 aktor atau lebih' => 3,
            default => 0,
        };
    
        return $data;
    }
}
