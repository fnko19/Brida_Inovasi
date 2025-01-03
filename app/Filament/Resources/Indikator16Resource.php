<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator16Resource\Pages;
use App\Filament\Resources\Indikator16Resource\RelationManagers;
use App\Models\Indikator16;
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

class Indikator16Resource extends Resource
{
    protected static ?string $model = Indikator16::class;

    protected static ?string $navigationGroup = 'Data Indikator';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama16_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter16')
                        ->label('Parameter')
                        ->options([
                            'Pernah 1 Kali direplikasi di daerah lain' => 'Pernah 1 Kali direplikasi di daerah lain',
                            'Pernah 2 Kali direplikasi di daerah lain' => 'Pernah 2 Kali direplikasi di daerah lain',
                            'Pernah 3 Kali direplikasi di daerah lain' => 'Pernah 3 Kali direplikasi di daerah lain',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot16 = match ($state) {
                                'Pernah 1 Kali direplikasi di daerah lain' => 3,
                                'Pernah 2 Kali direplikasi di daerah lain' => 6,
                                'Pernah 3 Kali direplikasi di daerah lain' => 9,
                                default => 0,
                            };
                            $set('bobot16', $bobot16); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot16')
                        ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot16')) 
                        ->required(),
                    
                    Select::make('inovasi16_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi16_id') 
                                ? request()->query('inovasi16_id') 
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
                ->getStateUsing(fn () => '<p>Replikasi</p>')
                ->html()
                ->searchable(false)  
                ->sortable(false), 
            TextColumn::make('permanent_column2')
                ->label('Keterangan')
                ->getStateUsing(fn() => '<p>Inovasi Daerah telah direplikasi oleh daerah lain</p>')
                ->html(),
                TextColumn::make('parameter16')
                ->label('Parameter'),
            TextColumn::make('bobot16')->label('Bobot'),
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
                ->url(fn (Indikator16 $record) => route('filament.admin.resources.indikator16-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator16s::route('/'),
            'create' => Pages\CreateIndikator16::route('/create'),
            'edit' => Pages\EditIndikator16::route('/{record}/edit'),
        ];
    }
}
