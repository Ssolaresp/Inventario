<?php

namespace App\Filament\Resources\DetalleEntradas\Pages;

use App\Filament\Resources\DetalleEntradas\DetalleEntradaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDetalleEntrada extends EditRecord
{
    protected static string $resource = DetalleEntradaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
