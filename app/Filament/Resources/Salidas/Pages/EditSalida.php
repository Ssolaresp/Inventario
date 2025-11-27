<?php

namespace App\Filament\Resources\Salidas\Pages;

use App\Filament\Resources\Salidas\SalidaResource;
use App\Models\ProductoAlmacen;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditSalida extends EditRecord
{
    protected static string $resource = SalidaResource::class;

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

        // Si cambió de PENDIENTE a PROCESADA → Descontar inventario
        if ($estadoAnterior === 'pendiente' && $estadoNuevo === 'procesada') {
            $this->procesarSalida();
        }

        // Si cambió de PROCESADA a CANCELADA → Devolver inventario
        if ($estadoAnterior === 'procesada' && $estadoNuevo === 'cancelada') {
            $this->devolverInventario();
        }

        return $data;
    }

    protected function procesarSalida(): void
    {
        $almacenId = $this->record->almacen_id;

        foreach ($this->record->detalles as $detalle) {
            // Validar stock antes de descontar
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

            if ($inventario->stock_inicial < $detalle->cantidad) {
                Notification::make()
                    ->danger()
                    ->title('Stock insuficiente')
                    ->body("El producto '{$detalle->producto->nombre}' solo tiene {$inventario->stock_inicial} unidades disponibles.")
                    ->send();
                
                $this->halt();
            }

            // Descontar inventario
            $inventario->decrement('stock_inicial', $detalle->cantidad);
        }

        Notification::make()
            ->success()
            ->title('Inventario actualizado')
            ->body('Se descontó el inventario correctamente.')
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
                // Devolver inventario
                $inventario->increment('stock_inicial', $detalle->cantidad);
            }
        }

        Notification::make()
            ->success()
            ->title('Inventario devuelto')
            ->body('Se devolvió el inventario al almacén.')
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
            ->title('Salida actualizada')
            ->body('Los cambios se guardaron correctamente.');
    }
}