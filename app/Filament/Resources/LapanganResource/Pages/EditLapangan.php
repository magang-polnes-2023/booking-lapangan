<?php

namespace App\Filament\Resources\LapanganResource\Pages;

use App\Filament\Resources\LapanganResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLapangan extends EditRecord
{
    protected static string $resource = LapanganResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
