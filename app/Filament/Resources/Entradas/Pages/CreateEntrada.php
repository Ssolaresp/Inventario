<?php

namespace App\Filament\Resources\Entradas\Pages;

use App\Filament\Resources\Entradas\EntradaResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateEntrada extends CreateRecord
{
    protected static string $resource = EntradaResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // Agregar usuario_id
        $data['usuario_id'] = auth()->id();

        // Crear la entrada
        $entrada = static::getModel()::create($data);

        return $entrada;
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
            ->title('Entrada creada')
            ->body('Ahora agrega los productos en la pestaña "Detalle de Productos".');
    }
}
