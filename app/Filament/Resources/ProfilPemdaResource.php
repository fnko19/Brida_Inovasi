<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilPemdaResource\Pages;
use App\Filament\Resources\ProfilPemdaResource\RelationManagers;
use App\Models\ProfilPemda;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfilPemdaResource extends Resource
{
    protected static ?string $model = ProfilPemda::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationGroup = 'Database Inovasi Daerah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tingkatan')
                    ->label('Tingkatan')
                    ->required(),
                
                Forms\Components\TextInput::make('opd_yang_menangani')
                    ->label('OPD yang Menangani')
                    ->required(),

                Forms\Components\TextInput::make('alamat')
                    ->label('Alamat Pemda')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->label('E-Mail')
                    ->required(),

                Forms\Components\TextInput::make('no_telp')
                    ->label('Nomor Telepon')
                    ->required(),

                Forms\Components\TextInput::make('admin')
                    ->label('Nama Admin')
                    ->required(),

                // Add the File Upload for Pakta Integritas
                FileUpload::make('pakta_integritas')
                    ->label('Pakta Integritas')
                    ->required()
                    ->disk('public')  
                    ->acceptedFileTypes(['application/pdf'])  
                    ->maxSize(10240),   
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tingkatan')
                    ->label('Tingkatan'),

                Tables\Columns\TextColumn::make('opd_yang_menangani')
                    ->label('OPD yang Menangani'),

                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat Pemda'),

                Tables\Columns\TextColumn::make('email')
                    ->label('E-Mail'),

                Tables\Columns\TextColumn::make('no_telp')
                    ->label('Nomor Telepon'),

                Tables\Columns\TextColumn::make('admin')
                    ->label('Nama Admin'),

                // Display a text column with the file URL or filename
                Tables\Columns\TextColumn::make('pakta_integritas')
                    ->label('Pakta Integritas')
                    ->getStateUsing(fn ($record) => $record->pakta_integritas ? $record->pakta_integritas : 'No file uploaded')
            ])
            ->filters([/* Filters can be added here */])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfilPemdas::route('/'),
            'create' => Pages\CreateProfilPemda::route('/create'),
            'edit' => Pages\EditProfilPemda::route('/{record}/edit'),
        ];
    }
}
