<?php

namespace App\Filament\Resources\Indikator11Resource\Pages;

use App\Filament\Resources\Indikator11Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator11 extends EditRecord
{
    protected static string $resource = Indikator11Resource::class;

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
        $data['bobot11'] = match ($data['parameter11'] ?? null) {
            'Telah terdapat Pedoman teknis berupa buku manual' => 1,
            'Telah terdapat Pedoman teknis berupa buku dalam bentuk elektronik' => 2,
            'Telah terdapat Pedoman teknis berupa buku yang dapat diakses secara online atau berupa video tutorial' => 3,
            default => 0,
        };
    
        return $data;
    }
}
