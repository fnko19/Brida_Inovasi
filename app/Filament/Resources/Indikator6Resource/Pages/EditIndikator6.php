<?php

namespace App\Filament\Resources\Indikator6Resource\Pages;

use App\Filament\Resources\Indikator6Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIndikator6 extends EditRecord
{
    protected static string $resource = Indikator6Resource::class;

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
        $data['bobot6'] = match ($data['parameter6'] ?? null) {
            'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 atau T-2' => 2,
            'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 dan T-2' => 4,
            'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1, T-2 dan T0 (T0 adalah Tahun Berjalan)' => 6,
            default => 0,
        };
    
        return $data;
    }
}
