<?php

namespace App\Filament\Resources\Entradas\Pages;

use App\Filament\Resources\Entradas\EntradaResource;
use App\Models\ProductoAlmacen;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditEntrada extends EditRecord
{
    protected static string $resource = EntradaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $estadoAnterior = $this->record->estado;
        $estadoNuevo = $data['estado'];

        // Si cambió de PENDIENTE a PROCESADA → Sumar inventario
        if ($estadoAnterior === 'Pendiente' && $estadoNuevo === 'Procesada') {
            $this->procesarEntrada();
        }

        // Si cambió de PROCESADA a CANCELADA → Devolver inventario
        if ($estadoAnterior === 'Procesada' && $estadoNuevo === 'Cancelada') {
            $this->devolverInventario();
        }

        return $data;
    }

    protected function procesarEntrada(): void
    {
        $almacenId = $this->record->almacen_id;

        foreach ($this->record->detalles as $detalle) {
            $inventario = ProductoAlmacen::where('producto_id', $detalle->producto_id)
                ->where('almacen_id', $almacenId)
                ->first();

            if (!$inventario) {
                Notification::make()
                    ->danger()
                    ->title('Producto no encontrado')
                    ->body("El producto '{$detalle->producto->nombre}' no existe en el almacén.")
                    ->send();
                
                $this->halt();
            }

            // Sumar inventario
            $inventario->increment('stock_inicial', $detalle->cantidad);
        }

        Notification::make()
            ->success()
            ->title('Inventario actualizado')
            ->body('Se sumó el inventario correctamente.')
            ->send();
    }

    protected function devolverInventario(): void
    {
        $almacenId = $this->record->almacen_id;

        foreach ($this->record->detalles as $detalle) {
            $inventario = ProductoAlmacen::where('producto_id', $detalle->producto_id)
                ->where('almacen_id', $almacenId)
                ->first();

            if ($inventario) {
                // Restar inventario al cancelar
                $inventario->decrement('stock_inicial', $detalle->cantidad);
            }
        }

        Notification::make()
            ->success()
            ->title('Inventario devuelto')
            ->body('Se actualizó el inventario del almacén.')
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Entrada actualizada')
            ->body('Los cambios se guardaron correctamente.');
    }
}
