<?php

namespace App\Filament\Resources\TransferenciaAlmacenes\Pages;

use App\Filament\Resources\TransferenciaAlmacenes\TransferenciaAlmacenResource;
use App\Models\ProductoAlmacen;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateTransferenciaAlmacen extends CreateRecord
{
    protected static string $resource = TransferenciaAlmacenResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // VALIDAR STOCK ANTES DE CREAR EL REGISTRO
        $this->validarStock(
            $data['producto_id'],
            $data['almacen_origen_id'],
            $data['cantidad']
        );

        // Obtener la fecha de vencimiento del producto origen
        $fechaVencimiento = $this->obtenerFechaVencimiento(
            $data['producto_id'],
            $data['almacen_origen_id']
        );

        // Crear el registro de transferencia
        $transferencia = static::getModel()::create($data);

        // Actualizar inventario del almacén origen (restar)
        $this->actualizarInventarioOrigen(
            $data['producto_id'],
            $data['almacen_origen_id'],
            $data['cantidad']
        );

        // Actualizar inventario del almacén destino (sumar)
        $this->actualizarInventarioDestino(
            $data['producto_id'],
            $data['almacen_destino_id'],
            $data['cantidad'],
            $fechaVencimiento
        );

        return $transferencia;
    }

    protected function validarStock($productoId, $almacenId, $cantidad)
    {
        $inventario = ProductoAlmacen::where('producto_id', $productoId)
            ->where('almacen_id', $almacenId)
            ->first();

        if (!$inventario) {
            Notification::make()
                ->danger()
                ->title('Producto no encontrado')
                ->body('El producto no existe en el almacén origen.')
                ->send();
            
            $this->halt();
        }

        if ($inventario->stock_inicial < $cantidad) {
            Notification::make()
                ->danger()
                ->title('Stock insuficiente')
                ->body("El almacén origen solo tiene {$inventario->stock_inicial} unidades disponibles.")
                ->send();
            
            $this->halt();
        }
    }

    protected function obtenerFechaVencimiento($productoId, $almacenId)
    {
        $inventario = ProductoAlmacen::where('producto_id', $productoId)
            ->where('almacen_id', $almacenId)
            ->first();

        return $inventario?->fecha_vencimiento;
    }

    protected function actualizarInventarioOrigen($productoId, $almacenId, $cantidad)
    {
        $inventario = ProductoAlmacen::where('producto_id', $productoId)
            ->where('almacen_id', $almacenId)
            ->first();

        // Ya validamos antes, ahora solo restamos
        $inventario->decrement('stock_inicial', $cantidad);
    }

    protected function actualizarInventarioDestino($productoId, $almacenId, $cantidad, $fechaVencimiento = null)
    {
        $inventario = ProductoAlmacen::where('producto_id', $productoId)
            ->where('almacen_id', $almacenId)
            ->first();

        if ($inventario) {
            // Si existe, sumar la cantidad
            $inventario->increment('stock_inicial', $cantidad);
            
            // Actualizar fecha de vencimiento si no existe o si la nueva es más próxima
            if ($fechaVencimiento) {
                if (!$inventario->fecha_vencimiento || 
                    $fechaVencimiento < $inventario->fecha_vencimiento) {
                    $inventario->update(['fecha_vencimiento' => $fechaVencimiento]);
                }
            }
        } else {
            // Si no existe, crear el registro
            ProductoAlmacen::create([
                'producto_id' => $productoId,
                'almacen_id' => $almacenId,
                'stock_inicial' => $cantidad,
                'stock_minimo' => 0,
                'stock_maximo' => 0,
                'fecha_vencimiento' => $fechaVencimiento,
            ]);

            Notification::make()
                ->success()
                ->title('Registro creado')
                ->body('Se creó un nuevo registro de inventario en el almacén destino.')
                ->send();
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Transferencia realizada')
            ->body('La transferencia se realizó correctamente y el inventario fue actualizado.');
    }
}