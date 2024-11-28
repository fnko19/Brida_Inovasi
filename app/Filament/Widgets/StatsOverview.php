<?php

namespace App\Filament\Widgets;

use App\Models\daftarOpd;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //Stat::make('Daftar OPD', daftarOpd::count()),
            //Stat::make('User', User::count()),
        ];
    }
}
