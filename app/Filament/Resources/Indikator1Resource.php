<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator1Resource\Pages;
use App\Filament\Resources\Indikator1Resource\RelationManagers;
use App\Models\Indikator1;
use App\Models\Indikator1File;
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
use Filament\Infolists\Components\Section;

class Indikator1Resource extends Resource
{
    protected static ?string $model = Indikator1::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Indikator 1';

    public static ?string $label = 'Indikator 1';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter')
                        ->options([
                            'SK Kepala Perangkat Daerah' => 'SK Kepala Perangkat Daerah',
                            'SK Kepala Daerah' => 'SK Kepala Daerah',
                            'Peraturan Kepala Daerah/Peraturan Daerah' => 'Peraturan Kepala Daerah/Peraturan Daerah',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot = match ($state) {
                                'SK Kepala Perangkat Daerah' => 1,
                                'SK Kepala Daerah' => 2,
                                'Peraturan Kepala Daerah/Peraturan Daerah' => 3,
                                default => 0,
                            };
                            $set('bobot', $bobot); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot')) 
                        ->required(),
                    
                    Select::make('inovasi_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi_id') 
                                ? request()->query('inovasi_id') 
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
                    ->getStateUsing(fn () => 'Regulasi Inovasi Daerah *')
                    ->searchable(false)  // Memastikan kolom ini tidak dicari
                    ->sortable(false), 
                TextColumn::make('permanent_column2')
                    ->label('Keterangan')
                    ->getStateUsing(fn() => '<p>Regulasi yang menetapkan nama-nama</p><p> inovasi daerah yang menjadi landasan </p><p> operasional penerapan Inovasi Daerah</p>')
                    ->html(),
                    TextColumn::make('parameter')
                    ->label('Parameter'),
                TextColumn::make('bobot')->label('Bobot'),
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
                    ->url(fn (Indikator1 $record) => route('filament.admin.resources.indikator1-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator1s::route('/'),
            'create' => Pages\CreateIndikator1::route('/create'),
            'edit' => Pages\EditIndikator1::route('/{record}/edit'),
        ];
    }
}
