<?php

namespace App\Filament\Resources\InovasiDaerahResource\Pages;

use App\Filament\Resources\InovasiDaerahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;
use Filament\Notifications\Notification;


class EditInovasiDaerah extends EditRecord
{
    protected static string $resource = InovasiDaerahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->validateRancangBangun($data);
        return $data;
    }
    
    private function validateRancangBangun(array $data)
    {
        $fields = [
            'dasar_hukum',
            'masalah',
            'metode_baru',
            'keunggulan',
	    'isu_global',
            'isu_nasional',
            'isu_lokal',
            'spesifikasi_inovasi',
        ];
    
        $totalWords = 0;
        foreach ($fields as $field) {
            $totalWords += str_word_count($data[$field] ?? '');
        }
    
        if ($totalWords < 300) {
            Notification::make()
                ->title('Gagal Validasi')
                ->danger() 
                ->body('Total kata pada Rancang Bangun harus minimal 300 kata.')
                ->send();
    
            throw ValidationException::withMessages([
                'rancang_bangun' => 'Total kata pada Rancang Bangun harus minimal 300 kata.',
            ]);
        }
    }
}