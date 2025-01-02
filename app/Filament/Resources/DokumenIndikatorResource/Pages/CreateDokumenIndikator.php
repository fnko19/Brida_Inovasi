<?php

namespace App\Filament\Resources\DokumenIndikatorResource\Pages;

use App\Filament\Resources\DokumenIndikatorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Request;
use Filament\Forms\Components\Hidden;

class CreateDokumenIndikator extends CreateRecord
{
    protected static string $resource = DokumenIndikatorResource::class;

}
