<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LinimasaInovasiResource\Pages;
use App\Filament\Resources\LinimasaInovasiResource\RelationManagers;
use App\Models\inovasi_daerah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables; 
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LinimasaInovasiResource extends Resource
{
    protected static ?string $model = inovasi_daerah::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Linimasa Inovasi';

    protected static ?string $navigationGroup = 'Database Inovasi Daerah';

    protected static ?int $navigationSort = 1;

    public static ?string $label = 'Linimasa Inovasi';

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
            ->columns([
                TextColumn::make('nama_inovasi')->label('Nama Inovasi'),
                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d-m-Y'))
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d-m-Y'))
                    ->sortable(),
                TextColumn::make('masa_berlaku')
                    ->label('Masa Berlaku Inovasi')
                    ->formatStateUsing(fn($state, $record) => 
                        $record->updated_at ? 
                        \Carbon\Carbon::parse($record->updated_at)->addYears(2)->format('d-m-Y') : 'Tanggal Tidak Tersedia'
                    )
                    ->sortable(),                                
            ])
            ->filters([
                //
            ])
            ->actions([
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListLinimasaInovasis::route('/'),
        ];
    }
}
