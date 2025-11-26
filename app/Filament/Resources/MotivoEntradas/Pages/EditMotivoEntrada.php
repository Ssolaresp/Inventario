<?php

namespace App\Filament\Resources\MotivoEntradas\Pages;

use App\Filament\Resources\MotivoEntradas\MotivoEntradaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMotivoEntrada extends EditRecord
{
    protected static string $resource = MotivoEntradaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
