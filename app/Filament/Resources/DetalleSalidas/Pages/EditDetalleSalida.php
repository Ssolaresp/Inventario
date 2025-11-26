<?php

namespace App\Filament\Resources\DetalleSalidas\Pages;

use App\Filament\Resources\DetalleSalidas\DetalleSalidaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDetalleSalida extends EditRecord
{
    protected static string $resource = DetalleSalidaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
