<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Filament::serving(function () {
            Filament::registerRenderHook(
                'brand',
                fn () => view('vendor.filament.components.logo') 
            );
        });
    }
}
