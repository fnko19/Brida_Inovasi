<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanDiklatResource\Pages;
use App\Filament\Resources\LaporanDiklatResource\RelationManagers;
use App\Models\LaporanDiklat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaporanDiklatResource extends Resource
{
    protected static ?string $model = LaporanDiklat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Data Laporan Diklat';

    protected static ?string $navigationGroup = 'Laporan Diklat';

    public static ?string $label = 'Data Diklat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama')->label('Nama Peserta')->required(),
                    TextInput::make('nip')->label('NIP')->required(),
                    TextInput::make('instansi')->label('Instansi')->required(),
                    Select::make('jenis_pelatihan')
                        ->label('Jenis Pelatihan')
                        ->searchable()
                        ->options([
                            '1' => 'Pelatihan Kepemimpinan Pengawas (PKP)',
                            '2' => 'Pelatihan Kepemimpinan Administrator (PKA)',
                            '3' => 'Pelatihan Kepemimpinan Nasional II (PKN II)',
                            '4' => 'Pelatihan Kepemimpinan Nasional I (PKN I)',
                            '5' => 'Pelatihan Dasar CPNS',
                        ])
                        ->required(),
                    TextInput::make('judul_pelatihan')->label('Judul Proyek Perubahan / Aksi Perubahan')->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('No'),
                TextColumn::make('nama')->label('Nama'),
                TextColumn::make('nip')->label('NIP'),
                TextColumn::make('instansi')->label('Instansi'),
                TextColumn::make('jenis_pelatihan')
                    ->label('Jenis Pelatihan')
                    ->formatStateUsing(fn ($state) => match ($state){
                        '1' => 'Pelatihan Kepemimpinan Pengawas (PKP)',
                        '2' => 'Pelatihan Kepemimpinan Administrator (PKA)',
                        '3' => 'Pelatihan Kepemimpinan Nasional II (PKN II)',
                        '4' => 'Pelatihan Kepemimpinan Nasional I (PKN I)',
                        '5' => 'Pelatihan Dasar CPNS',
                        '6' => 'Pelatihan Kepemimpinan Non-Structural',
                    }),
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
            'index' => Pages\ListLaporanDiklats::route('/'),
            'create' => Pages\CreateLaporanDiklat::route('/create'),
            'edit' => Pages\EditLaporanDiklat::route('/{record}/edit'),
        ];
    }
}
