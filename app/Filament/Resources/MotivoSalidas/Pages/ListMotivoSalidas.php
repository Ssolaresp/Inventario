<?php

namespace App\Filament\Resources\MotivoSalidas\Pages;

use App\Filament\Resources\MotivoSalidas\MotivoSalidaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMotivoSalidas extends ListRecords
{
    protected static string $resource = MotivoSalidaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
