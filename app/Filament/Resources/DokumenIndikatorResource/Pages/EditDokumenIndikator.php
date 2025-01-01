<?php

namespace App\Filament\Resources\DokumenIndikatorResource\Pages;

use App\Filament\Resources\DokumenIndikatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Request;

class EditDokumenIndikator extends EditRecord
{
    protected static string $resource = DokumenIndikatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function mount(int|string $record): void
    {
        parent::mount($record);  // Memanggil parent mount() untuk memastikan record dapat diproses.

        // Menangani parameter 'indikator' dari URL dan menyimpannya di session
        if ($indikatorId = request()->query('indikator')) {
            session(['last_selected_indikator_id' => $indikatorId]);
        }
    }
}
