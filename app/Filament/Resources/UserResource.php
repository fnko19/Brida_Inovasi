<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use App\Models\daftarOpd;
use App\Models\daftarUptd;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Akun';

    protected static ?string $navigationGroup = 'Konfigurasi';

    public static ?string $label = 'Daftar Pengguna';

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
                        ]),
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
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->searchable(),
                TextColumn::make('email')->label('Email'),
                // TextColumn::make('role')->label('Role')->sortable(),
                TextColumn::make('function')->label('Fungsi')->sortable(),
                TextColumn::make('uptdss.nama_uptd')
                    ->label('UPT')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('opdss.nama_opd')
                    ->label('OPD')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('roles.name')->label('ROle'),
            ])
            ->filters([
                // SelectFilter::make('role')
                //     ->label('Filter Role')
                //     ->options([
                //         'admin' => 'Admin',
                //         'user' => 'User',
                //     ]),
                SelectFilter::make('function')
                    ->label('Filter Fungsi')
                    ->options([
                        'upt' => 'UPT',
                        'opd' => 'OPD',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('')
                    ->color('info')
                    ->tooltip('Edit'),
                Tables\Actions\DeleteAction::make()
                    ->label('')
                    ->color('danger')
                    ->tooltip('Hapus'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
