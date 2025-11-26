<?php

namespace App\Filament\Resources\TransferenciaAlmacenes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TransferenciaAlmacenesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fecha_transferencia')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable(),
                
                TextColumn::make('producto.nombre')
                    ->label('Producto')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('almacenOrigen.nombre')
                    ->label('Almacén Origen')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('danger'),
                
                TextColumn::make('almacenDestino.nombre')
                    ->label('Almacén Destino')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('success'),
                
                TextColumn::make('cantidad')
                    ->label('Cantidad')
                    ->numeric()
                    ->sortable(),
                
                TextColumn::make('observaciones')
                    ->label('Observaciones')
                    ->limit(50)
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                TextColumn::make('updated_at')
                    ->label('Última Actualización')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('producto')
                    ->relationship('producto', 'nombre')
                    ->label('Producto')
                    ->searchable()
                    ->preload(),
                
                SelectFilter::make('almacen_origen')
                    ->relationship('almacenOrigen', 'nombre')
                    ->label('Almacén Origen')
                    ->searchable()
                    ->preload(),
                
                SelectFilter::make('almacen_destino')
                    ->relationship('almacenDestino', 'nombre')
                    ->label('Almacén Destino')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                ViewAction::make(), // Solo ver
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DeleteBulkAction::make(), // Eliminado
                ]),
            ])
            ->defaultSort('fecha_transferencia', 'desc');
    }
}


