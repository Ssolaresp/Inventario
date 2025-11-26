<?php

namespace App\Filament\Resources\TransferenciaAlmacenes\Pages;

use App\Filament\Resources\TransferenciaAlmacenes\TransferenciaAlmacenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTransferenciaAlmacenes extends ListRecords
{
    protected static string $resource = TransferenciaAlmacenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}