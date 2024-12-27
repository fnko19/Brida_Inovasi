<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserDiklatResource\Pages;
use App\Filament\Resources\UserDiklatResource\RelationManagers;
use App\Models\User;
use App\Models\daftarOpd;
use App\Models\daftarUptd;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserDiklatResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Konfigurasi Akun';

    protected static ?string $navigationGroup = 'Laporan Diklat';

    protected static ?int $navigationSort = 2;
    
    public static ?string $label = 'Konfigurasi Akun';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('name')->label('Nama Pengguna')->required(),
                    TextInput::make('email')->label('Email')->email()->required(),
                    Select::make('roles')
                        ->relationship('roles', 'name')
                        //->multiple()
                        ->preload()
                        ->searchable(),
                    // Select::make('role')
                    //     ->label('Role')
                    //     ->options([
                    //         'admin' => 'Admin',
                    //         'user' => 'User',
                    //     ])
                    //     ->required()
                    //     ->reactive(),
                    Select::make('function') 
                        ->label('Fungsi')
                        ->nullable()
                        //->required(fn (callable $get) => $get('role') !== 'admin')
                        ->options([
                            'upt' => 'UPT',
                            'opd' => 'OPD',
                        ])
                        ->reactive(),
                    Select::make('daftar_upt_id')
                        ->label('Daftar UPT')
                        ->options(fn () => daftarUptd::pluck('nama_uptd', 'id')) 
                        ->nullable()
                        ->hidden(fn (callable $get) => $get('function') !== 'upt') 
                        ->required(fn (callable $get) => $get('function') === 'upt'), 
                    Select::make('daftar_opd_id')
                        ->label('Daftar OPD')
                        ->options(fn () => daftarOpd::pluck('nama_opd', 'id')) 
                        ->nullable()
                        ->hidden(fn (callable $get) => $get('function') !== 'opd') 
                        ->required(fn (callable $get) => $get('function') === 'opd'), 
                    TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->required()
                        ->maxLength(255),
                    Select::make('role_diklat')
                        ->options([
                            'bukan peserta diklat' => 'Bukan Peserta Diklat',
                            'peserta diklat' => 'Peserta Diklat',
                        ])
                        ->required()
                        ->reactive(),
                    Select::make('sub_role')
                        ->options([
                            'admin diklat' => 'Admin Diklat',
                            'user diklat' => 'User Diklat',
                        ])
                        ->nullable()
                        ->required(fn (callable $get) => $get('role_diklat') === 'peserta diklat')
                        ->hidden(fn (callable $get) => $get('role_diklat') !== 'peserta diklat'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->searchable(),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('sub_role')->label('Role'),
                TextColumn::make('opdss.nama_opd')
                    ->label('OPD')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListUserDiklats::route('/'),
            'create' => Pages\CreateUserDiklat::route('/create'),
            'edit' => Pages\EditUserDiklat::route('/{record}/edit'),
        ];
    }
}
