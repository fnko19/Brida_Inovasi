<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator2Resource\Pages;
use App\Filament\Resources\Indikator2Resource\RelationManagers;
use App\Models\Indikator2;
use App\Models\Indikator2File;
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

class Indikator2Resource extends Resource
{
    protected static ?string $model = Indikator2::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Indikator 2';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static ?string $label = 'Indikator 2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama2_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter2')
                        ->label('Parameter')
                        ->options([
                            '1-10 SDM' => '1-10 SDM',
                            '11-30 SDM' => '11-30 SDM',
                            'Lebih dari 30' => 'Lebih dari 30',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot2 = match ($state) {
                                '1-10 SDM' => 2,
                                '11-30 SDM' => 4,
                                'Lebih dari 30' => 6,
                                default => 0,
                            };
                            $set('bobot2', $bobot2); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot2')
                        ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot2')) 
                        ->required(),
                    
                    Select::make('inovasi2_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi2_id') 
                                ? request()->query('inovasi2_id') 
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
                    ->getStateUsing(fn () => '<p>Ketersediaan SDM</p><p> Terhadap Inovasi Daerah *</p>')
                    ->html()
                    ->searchable(false)  // Memastikan kolom ini tidak dicari
                    ->sortable(false), 
                TextColumn::make('permanent_column2')
                    ->label('Keterangan')
                    ->getStateUsing(fn() => '<p>Jumlah SDM yang mengelola inovasi</p><p> daerah (Tahun Terakhir)</p>')
                    ->html(),
                    TextColumn::make('parameter2')
                    ->label('Parameter'),
                TextColumn::make('bobot2')->label('Bobot'),
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
                    ->url(fn (Indikator2 $record) => route('filament.admin.resources.indikator2-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator2s::route('/'),
            'create' => Pages\CreateIndikator2::route('/create'),
            'edit' => Pages\EditIndikator2::route('/{record}/edit'),
        ];
    }
}
