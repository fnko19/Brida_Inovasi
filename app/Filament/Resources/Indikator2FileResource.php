<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator2FileResource\Pages;
use App\Filament\Resources\Indikator2FileResource\RelationManagers;
use App\Models\Indikator2File;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Indikator2FileResource extends Resource
{
    protected static ?string $model = Indikator2File::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->header(fn () => new \Illuminate\Support\HtmlString(
            '<div class="p-4 bg-yellow-100 rounded-md text-sm text-yellow-800">
                <strong>Dokumen Pendukung Berupa:</strong> Keputusan atau Penugasan oleh Kepala Daerah/Kepala Perangkat Daerah/Kepala UPTD/Pimpinan Organisasi pada tahun penerapan (pdf).
            </div>'
        ))
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIndikator2Files::route('/'),
            'create' => Pages\CreateIndikator2File::route('/create'),
            'edit' => Pages\EditIndikator2File::route('/{record}/edit'),
        ];
    }
}
