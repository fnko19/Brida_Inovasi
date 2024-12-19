<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\InovasiOverview;

class ApiDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.api-dashboard';

    protected static ?string $navigationGroup = 'Konfigurasi'; 

    protected static ?string $navigationLabel = 'Akses API';

    public function getTitle(): string
    {
        return 'Akses API'; 
    }

    public function getViewData(): array
    {
        return [
            'apiKey' => 'f2851b1944cc7400aeda4dc57029a6915273ce28',
            'apiSecret' => 'f737b923042c3d8a5e6b70d1ff3dc70b1d5c7b13',
            'apiEndpoint' => 'https://api.indeks.inovasi.litbang.kemendagri.go.id',
            'accessToken' => 'GET /api/token?key=axcassadlkasjdklasd&secret=1234567',
        ];
    }

    public function getWidgets(): array
    {
        return [
            InovasiOverview::class, 
        ];
    }

}
