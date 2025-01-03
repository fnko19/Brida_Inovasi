<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator20Resource\Pages;
use App\Filament\Resources\Indikator20Resource\RelationManagers;
use App\Models\Indikator20;
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

class Indikator20Resource extends Resource
{
    protected static ?string $model = Indikator20::class;

    protected static ?string $navigationGroup = 'Data Indikator';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama20_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter20')
                        ->label('Parameter')
                        ->options([
                            'Memenuhi 1 atau 2 unsur substansi' => 'Memenuhi 1 atau 2 unsur substansi',
                            'Memenuhi 3 atau 4 unsur substansi' => 'Memenuhi 3 atau 4 unsur substansi',
                            'Memenuhi 5 unsur substansi' => 'Memenuhi 5 unsur substansi',

                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot20 = match ($state) {
                            'Memenuhi 1 atau 2 unsur substansi' => 4,
                            'Memenuhi 3 atau 4 unsur substansi' => 8,
                            'Memenuhi 5 unsur substansi' => 12,
                            default => 0,
                            };
                            $set('bobot20', $bobot20); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot20')
                        ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot20')) 
                        ->required(),
                    
                    Select::make('inovasi20_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi20_id') 
                                ? request()->query('inovasi20_id') 
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
                ->getStateUsing(fn () => '<p>Kualitas Inovasi Daerah *</p>')
                ->html()
                ->searchable(false)  
                ->sortable(false), 
            TextColumn::make('permanent_column2')
                ->label('Keterangan')
                ->getStateUsing(fn() => '<p>Kualitas inovasi daerah dapat dibuktikan dengan video penerapan inovasi daerah (2 Tahun Terakhir) (file MP4 maksimal ukuran video 100MB)</p>
<p>Data Pendukung:</p>
<ul>
  <li>Ketentuan video memvisualisasikan 5 substansi:
    <ol>
      <li>Latar belakang inovasi;</li>
      <li>Penjaringan ide;</li>
      <li>Pemilihan ide;</li>
      <li>Manfaat inovasi;</li>
      <li>Dampak inovasi.</li>
    </ol>
  </li>
  <li>Video inovasi dilengkapi dengan cover thumbnail dan ada logo Kemendagri dengan format JPG/JPEG/PNG.</li>
</ul>
')
                ->html(),
                TextColumn::make('parameter20')
                ->label('Parameter'),
            TextColumn::make('bobot20')->label('Bobot'),
            TextColumn::make('permanent_column3')
                ->label('Jenis Dokumen')
                ->getStateUsing(fn() => 'Video'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Action::make('viewDocuments')
                ->label('')
                ->url(fn (Indikator20 $record) => route('filament.admin.resources.indikator20-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator20s::route('/'),
            'create' => Pages\CreateIndikator20::route('/create'),
            'edit' => Pages\EditIndikator20::route('/{record}/edit'),
        ];
    }
}
