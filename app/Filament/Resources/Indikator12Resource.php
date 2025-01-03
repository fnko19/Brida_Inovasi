<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Indikator12Resource\Pages;
use App\Filament\Resources\Indikator12Resource\RelationManagers;
use App\Models\Indikator12;
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

class Indikator12Resource extends Resource
{
    protected static ?string $model = Indikator12::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Data Indikator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama12_inovasi')
                        ->label('Nama Inovasi Terkait')
                        ->required(),
                    Select::make('parameter12')
                        ->label('Parameter')
                        ->options([
                            'Informasi layanan diperoleh melalui 1 dari 4 metode' => 'Informasi layanan diperoleh melalui 1 dari 4 metode',
                            'Informasi layanan diperoleh melalui 2 dari 4 metode' => 'Informasi layanan diperoleh melalui 2 dari 4 metode',
                            'Informasi layanan diperoleh melalui 3 atau lebih metode' => 'Informasi layanan diperoleh melalui 3 atau lebih metode',
                        ])
                        ->afterStateUpdated(function ($state, callable $set) {
                            $bobot12 = match ($state) {
                                'Informasi layanan diperoleh melalui 1 dari 4 metode' => 1,
                                'Informasi layanan diperoleh melalui 2 dari 4 metode' => 2,
                                'Informasi layanan diperoleh melalui 3 atau lebih metode' => 3,
                                default => 0,
                            };
                            $set('bobot12', $bobot12); 
                        })
                        ->reactive()
                        ->required(),
                    TextInput::make('bobot12')
                    ->label('Bobot')
                        ->disabled()
                        ->default(fn ($get) => $get('bobot12')) 
                        ->required(),
                    
                    Select::make('inovasi12_id')
                        ->label('Pilih Inovasi')
                        ->options(inovasi_daerah::pluck('nama_inovasi', 'id'))
                        ->default(function () {
                            // Ambil nilai indikator_id dari URL atau session
                            return request()->query('inovasi12_id') 
                                ? request()->query('inovasi12_id') 
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
                    ->getStateUsing(fn () => '<p>Kemudahan Informasi</p><p> Layanan</p>')
                    ->html()
                    ->searchable(false)  
                    ->sortable(false), 
                TextColumn::make('permanent_column2')
                    ->label('Keterangan')
                    ->getStateUsing(fn() => '<p>Kemudahan mendapatkan informasi layanan, melalui metode sebagai berikut:</p>
<ul>
  <li>Manual, seperti: tatap muka/jemput bola/noken/unit pelayanan administrasi;</li>
  <li>Hotline, seperti: layanan email/telp;</li>
  <li>Media Sosial, seperti: instagram/facebook/whatsapp, dsb;</li>
  <li>Layanan Online, melalui website/web-aplikasi/aplikasi mobile (android atau ios).</li>
</ul>
')
                    ->html(),
                    TextColumn::make('parameter12')
                    ->label('Parameter'),
                TextColumn::make('bobot12')->label('Bobot'),
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
                    ->url(fn (Indikator12 $record) => route('filament.admin.resources.indikator12-files.index', ['dokumen' => $record->id]))
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
            'index' => Pages\ListIndikator12s::route('/'),
            'create' => Pages\CreateIndikator12::route('/create'),
            'edit' => Pages\EditIndikator12::route('/{record}/edit'),
        ];
    }
}
