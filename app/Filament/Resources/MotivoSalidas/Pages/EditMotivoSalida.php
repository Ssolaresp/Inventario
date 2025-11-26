<?php

namespace App\Filament\Resources\MotivoSalidas\Pages;

use App\Filament\Resources\MotivoSalidas\MotivoSalidaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMotivoSalida extends EditRecord
{
    protected static string $resource = MotivoSalidaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
