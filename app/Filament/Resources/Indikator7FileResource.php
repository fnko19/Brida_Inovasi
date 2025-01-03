<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator7FileResource\Pages;
use App\Filament\Resources\Indikator7FileResource\RelationManagers;
use App\Models\Indikator7File;
use App\Models\Indikator7;
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

class Indikator7FileResource extends Resource
{
    protected static ?string $model = Indikator7File::class;

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
                        ->required(),
                    Select::make('indikator7_id')
                        ->label('Pilih Indikator')
                        ->options(Indikator7::pluck('nama7_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('indikator7') 
                                ? request()->query('indikator7') 
                                : session('last_selected_indikator_id', Indikator7::first()->id);
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
                <strong>Dokumen Pendukung Berupa:</strong> Dibuktikan dengan Surat Keputusan Perangkat Daerah/Undangan rapat atau FGD/Dokumen kerjasama lintas stakeholder yang relevan dan disertai dengan keterangan unsur aktor inovasi yang terlibat pada tahun penerapan (pdf),
            </div>'
        ))
            ->columns([
                TextColumn::make('nomor_surat')->label('Nomor Surat')->sortable(),
                TextColumn::make('tgl_surat')->label('Tanggal Surat')->date(),
                TextColumn::make('tentang')->label('Tentang')->wrap(),
            ])
            ->filters([
                SelectFilter::make('indikator7_id')
                    ->label('Indikator')
                    ->options(Indikator7::pluck('nama7_inovasi', 'id')),
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
            'index' => Pages\ListIndikator7Files::route('/'),
            'create' => Pages\CreateIndikator7File::route('/create'),
            'edit' => Pages\EditIndikator7File::route('/{record}/edit'),
        ];
    }
}
