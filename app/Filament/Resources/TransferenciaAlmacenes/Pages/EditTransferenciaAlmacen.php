<?php

namespace App\Filament\Resources\TransferenciaAlmacenes\Pages;

use App\Filament\Resources\TransferenciaAlmacenes\TransferenciaAlmacenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTransferenciaAlmacen extends EditRecord
{
    protected static string $resource = TransferenciaAlmacenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}