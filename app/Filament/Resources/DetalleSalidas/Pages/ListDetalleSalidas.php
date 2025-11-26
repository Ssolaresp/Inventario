<?php

namespace App\Filament\Resources\DetalleSalidas\Pages;

use App\Filament\Resources\DetalleSalidas\DetalleSalidaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDetalleSalidas extends ListRecords
{
    protected static string $resource = DetalleSalidaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
