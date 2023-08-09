<?php

namespace App\Filament\Resources;

use closure;
use DateTime;
use Filament\Forms;
use Filament\Tables;
use App\Models\Booking;
use App\Models\lapangan;
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

    protected static ?string $navigationIcon = 'heroicon-s-book-open';

    protected static function getNavigationLabel(): string
    {
        return "Booking";
    }

    public static function getPluralLabel(): string
    {
        return "Booking";
    }

    protected static ?string $navigationGroup = 'Booking';

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
                            ->reactive()
                            ->afterStateUpdated(function (Closure $set, $state) {
                                $selected = lapangan::find($state);
                                $harga = $selected ? $selected->harga : null;
                                $set('harga', $harga);
                            })
                            ->required(),
                        TextInput::make('no_telp')
                            ->label('Nomor Telpon')
                            ->required(),
                        DatePicker::make('tanggal')
                            ->label('Tanggal Booking')
                            ->required(),
                        TextInput::make('durasi')
                            ->label('Durasi Booking')
                            ->numeric()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function (closure $set, $state, $get) {
                                $harga = $get('harga');
                                $total = $harga * $state;
                                $set('total', $total);
                            }),
                        TimePicker::make('start_time')
                            ->label('Waktu Mulai')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function (closure $set, $state, $get) {
                                $startTime = DateTime::createFromFormat('Y-m-d H:i:s', $state);
                                $durasi = (int) $get('durasi');
                                $endTime = clone $startTime;
                                $endTime->modify("+" . $durasi . "hours");
                                $endTimeStr = $endTime->format('Y-m-d H:i:s');
                                $set('end_time', $endTimeStr);
                            }),
                        TimePicker::make('end_time')
                            ->label('Waktu Selesai')
                            ->required()
                            ->disabled(),
                        TextInput::make('total')
                            ->label('Total Harga')
                            ->disabled(),
                        FileUpload::make('bukti')
                            ->label('Bukti bayar'),
                        Select::make('status')
                            ->options([
                                'belum dibayar' => 'Belum Dibayar',
                                'sudah dibayar' => 'Sudah Dibayar',
                                'Canceled' => 'Canceled',
                                'Sedang Diverifikasi' => 'Sedang Diverifikasi',
                                'selesai' => 'Selesai',
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
                        'Canceled' => 'Canceled',
                        'Sedang Diverifikasi' => 'Sedang Diverifikasi',
                        'selesai' => 'Selesai',
                        'digunakan' => 'Digunakan',

                    ])
            ])->defaultSort('created_at', 'desc')

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
