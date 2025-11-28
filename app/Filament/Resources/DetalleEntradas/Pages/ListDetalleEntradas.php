<?php

namespace App\Filament\Resources\DetalleEntradas\Pages;

use App\Filament\Resources\DetalleEntradas\DetalleEntradaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDetalleEntradas extends ListRecords
{
    protected static string $resource = DetalleEntradaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
