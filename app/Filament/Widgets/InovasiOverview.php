<?php

namespace App\Filament\Widgets;

use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\inovasi_daerah;

class InovasiOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Mengambil jumlah inovasi berdasarkan tahapan
        $inovasiYangDilaporkan = inovasi_daerah::count();
        $inovasiYangDikirim = inovasi_daerah::where('tahapan_inovasi', 'penerapan')->count();
        $skorJumlahInovasi = inovasi_daerah::sum('prioritas'); 
        $inisiatif = inovasi_daerah::where('tahapan_inovasi', 'inisiatif')->count();
        $ujiCoba = inovasi_daerah::where('tahapan_inovasi', 'uji_coba')->count();
        $penerapan = inovasi_daerah::where('tahapan_inovasi', 'penerapan')->count();

        return [
            Stat::make('', $inovasiYangDilaporkan)
                ->description('Inovasi Yang Dilaporkan')
                ->descriptionIcon('heroicon-m-clipboard-document-check', IconPosition::Before)
                ->color('amber'),
            Stat::make('', $inovasiYangDikirim)
                ->description('Inovasi Yang Dikirim')
                ->descriptionIcon('heroicon-m-clipboard-document-list', IconPosition::Before)
                ->color('amber'),
            Stat::make('', $skorJumlahInovasi)
                ->description('Skor Jumlah Inovasi')
                ->descriptionIcon('heroicon-m-calculator', IconPosition::Before)
                ->color('amber'),
            Stat::make('', $inisiatif)
                ->description('Inisiatif')
                ->descriptionIcon('heroicon-m-light-bulb', IconPosition::Before)
                ->color('amber'),
            Stat::make('', $ujiCoba)
                ->description('Uji Coba')
                ->descriptionIcon('heroicon-m-clipboard', IconPosition::Before)
                ->color('amber'),
            Stat::make('', $penerapan)
                ->description('Penerapan')
                ->descriptionIcon('heroicon-m-wrench-screwdriver', IconPosition::Before)
                ->color('amber'),
        ];
    }
}
