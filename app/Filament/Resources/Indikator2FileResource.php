<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator2FileResource\Pages;
use App\Filament\Resources\Indikator2FileResource\RelationManagers;
use App\Models\Indikator2File;
use App\Models\Indikator2;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Card;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Select;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Indikator2FileResource extends Resource
{
    protected static ?string $model = Indikator2File::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

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
                    Select::make('indikator2_id')
                        ->label('Pilih Indikator')
                        ->options(Indikator1::pluck('nama2_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('indikator2') 
                                ? request()->query('indikator2') 
                                : session('last_selected_indikator_id', Indikator2::first()->id);
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
                <strong>Dokumen Pendukung Berupa:</strong> Keputusan atau Penugasan oleh Kepala Daerah/Kepala Perangkat Daerah/Kepala UPTD/Pimpinan Organisasi pada tahun penerapan (pdf).
            </div>'
        ))
            ->columns([
                TextColumn::make('nomor_surat')->label('Nomor Surat')->sortable(),
                TextColumn::make('tgl_surat')->label('Tanggal Surat')->date(),
                TextColumn::make('tentang')->label('Tentang')->wrap(),
            ])
            ->filters([
                SelectFilter::make('indikator2_id')
                    ->label('Indikator')
                    ->options(Indikator2::pluck('nama2_inovasi', 'id')),
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
            'index' => Pages\ListIndikator2Files::route('/'),
            'create' => Pages\CreateIndikator2File::route('/create'),
            'edit' => Pages\EditIndikator2File::route('/{record}/edit'),
        ];
    }
}
