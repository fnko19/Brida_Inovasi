<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class FaqWhatsApp extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.faq-whats-app';

    protected static ?string $navigationLabel = 'FAQ';

    public static ?string $label = 'Ada Pertanyaan?';
    //protected static ?string $navigationGroup = '';
    protected static ?string $slug = 'FAQ';
}
