<?php

namespace App\Filament\Resources\Almacenes\Pages;

use App\Filament\Resources\Almacenes\AlmacenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAlmacen extends EditRecord
{
    protected static string $resource = AlmacenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}