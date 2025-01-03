<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator19Resource\Pages;
use App\Filament\Resources\Indikator19Resource\RelationManagers;
use App\Models\Indikator19;
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

class Indikator19Resource extends Resource
{
    protected static ?string $model = Indikator19::class;

    protected static ?string $navigationGroup = 'Data Indikator';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama19_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter19')
                        ->label('Parameter')
                        ->options([
                            'Hasil inovasi monev internal perangkat daerah' => 'Hasil inovasi monev internal perangkat daerah',
                            'Hasil pengukuran kepuasan pengguna dari evaluasi Survei Kepuasan Masyarakat' => 'Hasil pengukuran kepuasan pengguna dari evaluasi Survei Kepuasan Masyarakat',
                            'Hasil laporan monev eksternal berdasarkan hasil penelitian/kajian/analisis' => 'Hasil laporan monev eksternal berdasarkan hasil penelitian/kajian/analisis',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot19 = match ($state) {
                            'Hasil inovasi monev internal perangkat daerah' => 2,
                            'Hasil pengukuran kepuasan pengguna dari evaluasi Survei Kepuasan Masyarakat' => 4,
                            'Hasil laporan monev eksternal berdasarkan hasil penelitian/kajian/analisis' => 6,
                            default => 0,
                            };
                            $set('bobot19', $bobot19); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot19')
                        ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot19')) 
                        ->required(),
                    
                    Select::make('inovasi19_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi19_id') 
                                ? request()->query('inovasi19_id') 
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
                ->getStateUsing(fn () => '<p>Monitoring dan Evaluasi Inovasi Daerah</p>')
                ->html()
                ->searchable(false)  
                ->sortable(false), 
            TextColumn::make('permanent_column2')
                ->label('Keterangan')
                ->getStateUsing(fn() => '<p>Kepuasan pelaksanaan penggunaan inovasi daerah </p>')
                ->html(),
                TextColumn::make('parameter19')
                ->label('Parameter'),
            TextColumn::make('bobot19')->label('Bobot'),
            TextColumn::make('permanent_column3')
                ->label('Jenis Dokumen')
                ->getStateUsing(fn() => 'Dokumen/Foto/Gambar'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Action::make('viewDocuments')
                ->label('')
                ->url(fn (Indikator19 $record) => route('filament.admin.resources.indikator19-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator19s::route('/'),
            'create' => Pages\CreateIndikator19::route('/create'),
            'edit' => Pages\EditIndikator19::route('/{record}/edit'),
        ];
    }
}
