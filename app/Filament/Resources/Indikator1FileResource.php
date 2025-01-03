<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator1FileResource\Pages;
use App\Filament\Resources\Indikator1FileResource\RelationManagers;
use App\Models\Indikator1File;
use App\Models\Indikator1;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
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

class Indikator1FileResource extends Resource
{
    protected static ?string $model = Indikator1File::class;

    protected static ?string $navigationGroup = 'Data Indikator';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nomor_surat')
                        ->label('Nomor Surat')
                        ->required(),
                    DatePicker::make('tgl_surat')
                        ->label('Tanggal Surat')
                        ->required(),
                    TextInput::make('tentang')
                        ->label('Tentang')
                        ->required(),
                    FileUpload::make('file_path')
                        ->label('Upload File')
                        ->directory('uploads')
                        ->acceptedFileTypes(['application/pdf'])
                        ->required(),
                    Select::make('indikator_id')
                        ->label('Pilih Indikator')
                        ->options(Indikator1::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('indikator') 
                                ? request()->query('indikator') 
                                : session('last_selected_indikator_id', Indikator1::first()->id);
                        })
                        //->disabled(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->header(fn () => new \Illuminate\Support\HtmlString(
            '<div class="p-4 bg-yellow-100 rounded-md text-sm text-yellow-800">
                <strong>Dokumen Pendukung Berupa:</strong> Perda atau Perkada atau SK Kepala Daerah atau SK Kepala Perangkat Daerah serta halaman yang memuat nama inovasi yang sah dan valid serta sesuai pada tahun saat penerapan (pdf).
            </div>'
        ))
            ->columns([
                TextColumn::make('nomor_surat')->label('Nomor Surat')->sortable(),
                TextColumn::make('tgl_surat')->label('Tanggal Surat')->date(),
                TextColumn::make('tentang')->label('Tentang')->wrap(),
            ])
            ->filters([
                SelectFilter::make('indikator_id')
                    ->label('Indikator')
                    ->options(Indikator1::pluck('nama_inovasi', 'id')),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('')
                    ->color('info')
                    ->tooltip('Edit'),
                Action::make('view')
                    ->label('')
                    ->url(fn ($record) => asset('storage/' . $record->file_path)) 
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-eye')
                    ->tooltip('Lihat'),
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
            'index' => Pages\ListIndikator1Files::route('/'),
            'create' => Pages\CreateIndikator1File::route('/create'),
            'edit' => Pages\EditIndikator1File::route('/{record}/edit'),
        ];
    }

}
