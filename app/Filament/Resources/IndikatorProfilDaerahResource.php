<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndikatorProfilDaerahResource\Pages;
use App\Filament\Resources\IndikatorProfilDaerahResource\RelationManagers;
use App\Models\IndikatorProfilDaerah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IndikatorProfilDaerahResource extends Resource
{
    protected static ?string $model = IndikatorProfilDaerah::class;

    protected static ?string $navigationGroup = 'Database Inovasi Daerah';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Indikator Profil Daerah';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama_indikator')->label('Indikator SPD')->required(),
                    Textarea::make('informasi')->label('Informasi')->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_indikator')
                    ->label('Indikator SPD')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('informasi')
                    ->label('Informasi')
                    ->limit(50)
                    ->wrap(),
                ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('')
                    ->color('info')
                    ->tooltip('Edit'),
                Action::make('viewDocuments')
                    ->label('')
                    ->url(fn (IndikatorProfilDaerah $record) => route('filament.admin.resources.dokumen-indikators.index', ['indikator' => $record->id]))
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
            'index' => Pages\ListIndikatorProfilDaerahs::route('/'),
            'create' => Pages\CreateIndikatorProfilDaerah::route('/create'),
            'edit' => Pages\EditIndikatorProfilDaerah::route('/{record}/edit'),
        ];
    }
}
