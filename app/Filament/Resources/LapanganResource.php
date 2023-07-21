<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Lapangan;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LapanganResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LapanganResource\RelationManagers;

class LapanganResource extends Resource
{
    protected static ?string $model = Lapangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static function getNavigationLabel(): string
    {
        return "Lapangan";
    }

    public static function getPluralLabel(): string
    {
        return "Lapangan";
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('gambar'),
                TextInput::make('nama')
                    ->required(),
                Textarea::make('deskripsi'),
                TextInput::make('harga')
                    ->numeric()
                    ->required()
                    ->thausandsSeparator(','),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar'),
                TextColumn::make('nama'),
                TextColumn::make('deskripsi'),
                TextColumn::make('harga')
                    ->money('ldr'),
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
            'index' => Pages\ListLapangans::route('/'),
            'create' => Pages\CreateLapangan::route('/create'),
            'edit' => Pages\EditLapangan::route('/{record}/edit'),
        ];
    }
}
