<?php

namespace App\Filament\Resources\MotivoEntradas\Pages;

use App\Filament\Resources\MotivoEntradas\MotivoEntradaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMotivoEntradas extends ListRecords
{
    protected static string $resource = MotivoEntradaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
