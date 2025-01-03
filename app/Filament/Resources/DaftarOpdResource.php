<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarOpdResource\Pages;
use App\Filament\Resources\DaftarOpdResource\RelationManagers;
use App\Models\DaftarOpd;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Placeholder;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DaftarOpdResource extends Resource
{
    protected static ?string $model = DaftarOpd::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Daftar OPD';

    protected static ?string $navigationGroup = 'Konfigurasi';

    protected static ?int $navigationSort = 3;

    public static ?string $label = 'Daftar OPD';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    Placeholder::make('note')
                        ->label('Daerah')
                        ->helperText('Kota Makassar'),
                    TextInput::make('nama_opd'),
                    Placeholder::make('note')
                        ->label('Dibuat Oleh')
                        ->helperText('Badan Riset dan Inovasi Daerah'),
                    Placeholder::make('note')
                        ->label('Last Update Oleh')
                        ->helperText('Badan Riset dan Inovasi Daerah'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('No'),
                TextColumn::make('nama_opd')
                    ->label('Nama OPD')
                    ->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('')
                    ->color('info')
                    ->tooltip('Edit'),
                Tables\Actions\DeleteAction::make()
                    ->label('')
                    ->color('danger')
                    ->tooltip('Hapus'),
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
            'index' => Pages\ListDaftarOpds::route('/'),
            'create' => Pages\CreateDaftarOpd::route('/create'),
            'edit' => Pages\EditDaftarOpd::route('/{record}/edit'),
        ];
    }
}
