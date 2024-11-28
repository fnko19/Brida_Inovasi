<?php

namespace App\Filament\Widgets;

use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InovasiOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('', '0')
                ->description('Inovasi Yang Dilaporkan')
                ->descriptionIcon('heroicon-m-clipboard-document-check', IconPosition::Before)
                ->color('primary'),
            Stat::make('', '0')
                ->description('Inovasi Yang Dikirim')
                ->descriptionIcon('heroicon-m-clipboard-document-list', IconPosition::Before)
                ->color('primary'),
            Stat::make('', '0')
                ->description('Skor Jumlah Inovasi')
                ->descriptionIcon('heroicon-m-calculator', IconPosition::Before)
                ->color('primary'),
            Stat::make('', '0')
                ->description('Inisiatif')
                ->descriptionIcon('heroicon-m-light-bulb', IconPosition::Before)
                ->color('primary'),
            Stat::make('', '0')
                ->description('Uji Coba')
                ->descriptionIcon('heroicon-m-clipboard', IconPosition::Before)
                ->color('primary'),
            Stat::make('', '0')
                ->description('Penerapan')
                ->descriptionIcon('heroicon-m-wrench-screwdriver', IconPosition::Before)
                ->color('primary'),
        ];
    }
}
