<?php

namespace App\Filament\Resources\DokumenIndikatorResource\Pages;

use App\Filament\Resources\DokumenIndikatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListDokumenIndikators extends ListRecords
{
    protected static string $resource = DokumenIndikatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTableQuery(): Builder
    {
        $query = parent::getTableQuery(); // Tidak statis

        // Ambil parameter 'indikator' dari URL
        $indikatorId = request()->query('indikator');

        // Filter query berdasarkan indikator_id jika parameter tersedia
        if ($indikatorId) {
            $query->where('indikator_id', $indikatorId);
        }

        return $query;
    }
}

// namespace App\Filament\Resources\DokumenIndikatorResource\Pages;

// use App\Filament\Resources\DokumenIndikatorResource;
// use Filament\Actions;
// use Filament\Resources\Pages\ListRecords;
// use Illuminate\Database\Eloquent\Builder;

// class ListDokumenIndikators extends ListRecords
// {
//     protected static string $resource = DokumenIndikatorResource::class;

//     protected function getHeaderActions(): array
//     {
//         return [
//             Actions\CreateAction::make(),
//         ];
//     }

//     public static function getTableQuery(): Builder
//     {
//         $query = parent::getTableQuery();

//         // Ambil parameter 'indikator' dari URL
//         $indikatorId = request()->query('indikator');

//         // Filter query berdasarkan indikator_id jika parameter tersedia
//         if ($indikatorId) {
//             $query->where('indikator_id', $indikatorId);
//         }

//         return $query;
//     }
// }
