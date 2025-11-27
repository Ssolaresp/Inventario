<?php

namespace App\Filament\Resources\Salidas\Pages;

use App\Filament\Resources\Salidas\SalidaResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateSalida extends CreateRecord
{
    protected static string $resource = SalidaResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // Agregar usuario_id
        $data['usuario_id'] = auth()->id();

        // Crear la salida
        $salida = static::getModel()::create($data);

        return $salida;
    }

    protected function getRedirectUrl(): string
    {
        // Redirigir al edit para que agregue los detalles con el RelationManager
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Salida creada')
            ->body('Ahora agrega los productos en la pestaña "Detalle de Productos".');
    }
}