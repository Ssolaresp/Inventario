<?php

namespace App\Filament\Resources\ProductoAlmacenes\Pages;

use App\Filament\Resources\ProductoAlmacenes\ProductoAlmacenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProductoAlmacenes extends ListRecords
{
    protected static string $resource = ProductoAlmacenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}