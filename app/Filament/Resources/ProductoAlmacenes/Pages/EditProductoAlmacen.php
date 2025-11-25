<?php

namespace App\Filament\Resources\ProductoAlmacenes\Pages;

use App\Filament\Resources\ProductoAlmacenes\ProductoAlmacenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProductoAlmacen extends EditRecord
{
    protected static string $resource = ProductoAlmacenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}