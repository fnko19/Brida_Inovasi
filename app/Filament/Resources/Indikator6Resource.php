<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator6Resource\Pages;
use App\Filament\Resources\Indikator6Resource\RelationManagers;
use App\Models\Indikator6;
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

class Indikator6Resource extends Resource
{
    protected static ?string $model = Indikator6::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama6_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter6')
                    ->label('Parameter')
                        ->options([
                            'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 atau T-2' => 'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 atau T-2',
                            'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 dan T-2' => 'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 dan T-2',
                            'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1, T-2 dan T0 (T0 adalah Tahun Berjalan)' => 'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1, T-2 dan T0 (T0 adalah Tahun Berjalan)',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot6 = match ($state) {
                                'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 atau T-2' => 2,
                                'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1 dan T-2' => 4,
                                'Pemerintah daerah sudah menuangkan program inovasi daerah dalam RKPD T-1, T-2 dan T0 (T0 adalah Tahun Berjalan)' => 6,
                                default => 0,
                            };
                            $set('bobot6', $bobot6); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot6')
                    ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot6')) 
                        ->required(),
                    
                    Select::make('inovasi6_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi6_id') 
                                ? request()->query('inovasi6_id') 
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
                    ->getStateUsing(fn () => '<p>Integrasi Program Dan Kegiatan</p><p> Inovasi Dalam RKPD</p>')
                    ->html()
                    ->searchable(false)  
                    ->sortable(false), 
                TextColumn::make('permanent_column2')
                    ->label('Keterangan')
                    ->getStateUsing(fn() => '<p>Inovasi Perangkat Daerah telah dituangkan</p><p> dalam program pembangunan daerah</p>')
                    ->html(),
                    TextColumn::make('parameter6')
                    ->label('Parameter'),
                TextColumn::make('bobot6')->label('Bobot'),
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
                    ->url(fn (Indikator6 $record) => route('filament.admin.resources.indikator6-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator6s::route('/'),
            'create' => Pages\CreateIndikator6::route('/create'),
            'edit' => Pages\EditIndikator6::route('/{record}/edit'),
        ];
    }
}
