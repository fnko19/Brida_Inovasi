<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DokumenIndikatorResource\Pages;
use App\Filament\Resources\DokumenIndikatorResource\RelationManagers;
use App\Models\DokumenIndikator;
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
use App\Models\IndikatorProfilDaerah;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DokumenIndikatorResource extends Resource
{
    protected static ?string $model = DokumenIndikator::class;

    protected static ?string $navigationGroup = 'Database Inovasi Daerah';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Dokumen Indikator';

    public static ?string $label = 'Dokumen Pendukung Indikator Profil Daerah';

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
                        ->mimes('pdf')
                        ->saveAs(function ($file) {
                            return $file->getClientOriginalName();
                        }) 
                        ->required(),
                    Select::make('indikator_id')
                        ->label('Pilih Indikator')
                        ->options(IndikatorProfilDaerah::pluck('nama_indikator', 'id'))
                        ->default(function () {
                            return session('last_selected_indikator_id', IndikatorProfilDaerah::first()->id);
                        })
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_surat')->label('Nomor Surat')->sortable(),
                TextColumn::make('tgl_surat')->label('Tanggal Surat')->date(),
                TextColumn::make('tentang')->label('Tentang')->wrap(),
            ])
            ->filters([
                SelectFilter::make('indikator_id')
                    ->label('Indikator')
                    ->options(IndikatorProfilDaerah::pluck('nama_indikator', 'id')),
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
            'index' => Pages\ListDokumenIndikators::route('/'),
            'create' => Pages\CreateDokumenIndikator::route('/create'),
            'edit' => Pages\EditDokumenIndikator::route('/{record}/edit'),
        ];
    }
}
