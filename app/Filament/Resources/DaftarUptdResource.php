<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarUptdResource\Pages;
use App\Filament\Resources\DaftarUptdResource\RelationManagers;
use App\Models\DaftarUptd;
use App\Filament\Resources\DaftarOpdResources;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DaftarUptdResource extends Resource
{
    protected static ?string $model = daftarUptd::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationGroup = 'Konfigurasi';

    public static ?string $label = 'Daftar UPTD';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama_uptd')
                        ->label('Nama UPTD')
                        ->required(),
                    Select::make('daftar_opd_id')
                        ->label('Nama OPD')
                        ->relationship('opds', 'nama_opd') 
                        ->required(),
                    TextInput::make('daerah')
                        ->label('Daerah')
                        ->default('Kota Makassar')
                        ->disabled(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('No'),
                TextColumn::make('nama_uptd')->label('Nama UPTD'),
                TextColumn::make('opds.nama_opd')  
                    ->label('Nama OPD')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('daerah')
                    ->label('Daerah'),
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
            'index' => Pages\ListDaftarUptds::route('/'),
            'create' => Pages\CreateDaftarUptd::route('/create'),
            'edit' => Pages\EditDaftarUptd::route('/{record}/edit'),
        ];
    }
}
