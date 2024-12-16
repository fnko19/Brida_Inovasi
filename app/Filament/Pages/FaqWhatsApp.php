<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class FaqWhatsApp extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.faq-whats-app';

    protected static ?string $navigationLabel = 'FAQ';
    
    protected static ?string $slug = 'FAQ';

    public function getTitle(): string
    {
        return 'Ada Pertanyaan?'; 
    }
}
