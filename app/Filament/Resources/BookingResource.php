<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Booking;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BookingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BookingResource\RelationManagers;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static function getNavigationLabel(): string
    {
        return "Booking";
    }

    public static function getPluralLabel(): string
    {
        return "Booking";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('user_id')
                            ->label('Nama User')
                            ->relationship('user', 'name')
                            ->required(),
                        Select::make('lapangan_id')
                            ->label('Nama Lapangan')
                            ->relationship('lapangan', 'nama')
                            ->required(),
                        TextInput::make('no_telp')
                            ->label('Nomor Telpon')
                            ->required(),
                        DatePicker::make('tanggal')
                            ->label('Tanggal Booking')
                            ->required(),
                        Select::make('durasi')
                            ->options([
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                            ])
                            ->required(),
                        TimePicker::make('start_time')
                            ->label('Waktu Mulai')
                            ->required(),
                        TimePicker::make('end_time')
                            ->label('Waktu Selesai')
                            ->required(),
                        FileUpload::make('bukti')
                            ->label('Bukti bayar'),
                        Select::make('status')
                            ->options([
                                'belum dibayar' => 'Belum Dibayar',
                                'sudah dibayar' => 'Sudah Dibayar',
                                'digunakan' => 'Digunakan',
                            ]),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('lapangan.nama')
                    ->searchable(),
                TextColumn::make('tanggal'),
                TextColumn::make('durasi'),
                ImageColumn::make('bukti'),
                SelectColumn::make('status')
                    ->options([
                        'belum dibayar' => 'Belum Dibayar',
                        'sudah dibayar' => 'Sudah Dibayar',
                        'digunakan' => 'Digunakan',
                    ])
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
