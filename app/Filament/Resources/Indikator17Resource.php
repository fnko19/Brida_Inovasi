<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator17Resource\Pages;
use App\Filament\Resources\Indikator17Resource\RelationManagers;
use App\Models\Indikator17;
use App\Models\inovasi_daerah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Card;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Indikator17Resource extends Resource
{
    protected static ?string $model = Indikator17::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama17_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter17')
                        ->label('Parameter')
                        ->options([
                            'Inovasi dapat diciptakan dalam waktu 9 bulan atau lebih' => 'Inovasi dapat diciptakan dalam waktu 9 bulan atau lebih',
                            'Inovasi dapat diciptakan dalam waktu 5-8 bulan' => 'Inovasi dapat diciptakan dalam waktu 5-8 bulan',
                            'Inovasi dapat diciptakan dalam waktu 1-4 bulan' => 'Inovasi dapat diciptakan dalam waktu 1-4 bulan',

                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot17 = match ($state) {
                                'Inovasi dapat diciptakan dalam waktu 9 bulan atau lebih' => 2,
                                'Inovasi dapat diciptakan dalam waktu 5-8 bulan' => 4,
                                'Inovasi dapat diciptakan dalam waktu 1-4 bulan' => 6,

                                default => 0,
                            };
                            $set('bobot17', $bobot17); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot17')
                        ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot17')) 
                        ->required(),
                    
                    Select::make('inovasi17_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi17_id') 
                                ? request()->query('inovasi17_id') 
                                : session('last_selected_inovasi_id', inovasi_daerah::first()->id);
                        })
                        //->disabled(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('permanent_column1')
                ->label('Indikator')
                ->getStateUsing(fn () => '<p>Kecepatan penciptaan</p><p> inovasi *</p>')
                ->html()
                ->searchable(false)  
                ->sortable(false), 
            TextColumn::make('permanent_column2')
                ->label('Keterangan')
                ->getStateUsing(fn() => '<p>Satuan waktu yang digunakan untuk</p><p> menciptakan inovasi daerah yang kompleks.</p>')
                ->html(),
                TextColumn::make('parameter17')
                ->label('Parameter'),
            TextColumn::make('bobot17')->label('Bobot'),
            TextColumn::make('permanent_column3')
                ->label('Jenis Dokumen')
                ->getStateUsing(fn() => 'Dokumen PDF'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Action::make('viewDocuments')
                ->label('')
                ->url(fn (Indikator17 $record) => route('filament.admin.resources.indikator17-files.index', ['dokumen' => $record->id]))
                ->icon('heroicon-o-document-text')
                ->tooltip('Lihat Dokumen'),
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
            'index' => Pages\ListIndikator17s::route('/'),
            'create' => Pages\CreateIndikator17::route('/create'),
            'edit' => Pages\EditIndikator17::route('/{record}/edit'),
        ];
    }
}
