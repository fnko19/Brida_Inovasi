<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator7Resource\Pages;
use App\Filament\Resources\Indikator7Resource\RelationManagers;
use App\Models\Indikator7;
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

class Indikator7Resource extends Resource
{
    protected static ?string $model = Indikator7::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama7_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter7')
                    ->label('Parameter')
                        ->options([
                            'Inovasi melibatkan 3 aktor' => 'Inovasi melibatkan 3 aktor',
                            'Inovasi melibatkan 4 aktor' => 'Inovasi melibatkan 4 aktor',
                            'Inovasi melibatkan 5 aktor atau lebih' => 'Inovasi melibatkan 5 aktor atau lebih',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot7 = match ($state) {
                                'Inovasi melibatkan 3 aktor'  => 1,
                                'Inovasi melibatkan 4 aktor' => 2,
                                'Inovasi melibatkan 5 aktor atau lebih' => 3,
                                default => 0,
                            };
                            $set('bobot7', $bobot7); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot7')
                        ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot7')) 
                        ->required(),
                    
                    Select::make('inovasi7_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi7_id') 
                                ? request()->query('inovasi7_id') 
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
                    ->getStateUsing(fn () => 'Keterlibatan aktor inovasi')
                    ->html()
                    ->searchable(false)  
                    ->sortable(false), 
                TextColumn::make('permanent_column2')
                    ->label('Keterangan')
                    ->getStateUsing(fn() => '
    <p>Keikutsertaan unsur stakeholder dalam pelaksanaan inovasi daerah meliputi:</p>
    <ul>
        <li>Pemerintah</li>
        <li>Pelaku Bisnis</li>
        <li>Komunitas</li>
        <li>Akademisi</li>
        <li>Media Massa</li>
        <li>dan lainnya</li>
    </ul>
')
                    ->html(),
                TextColumn::make('parameter7')
                    ->label('Parameter'),
                TextColumn::make('bobot7')->label('Bobot'),
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
                    ->url(fn (Indikator7 $record) => route('filament.admin.resources.indikator7-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator7s::route('/'),
            'create' => Pages\CreateIndikator7::route('/create'),
            'edit' => Pages\EditIndikator7::route('/{record}/edit'),
        ];
    }
}
