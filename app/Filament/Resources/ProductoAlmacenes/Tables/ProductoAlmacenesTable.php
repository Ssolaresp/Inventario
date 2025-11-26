<?php

namespace App\Filament\Resources\ProductoAlmacenes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductoAlmacenesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('producto.nombre')
                    ->label('Producto')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('almacen.nombre')
                    ->label('Almacén')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('stock_inicial')
                    ->label('Stock Inicial')
                    ->numeric()
                    ->sortable(),
                
                TextColumn::make('stock_minimo')
                    ->label('Stock Mínimo')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color('warning'),
                
                TextColumn::make('stock_maximo')
                    ->label('Stock Máximo')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color('success'),
                
                TextColumn::make('fecha_vencimiento')
                    ->label('Fecha de Vencimiento')
                    ->date('d/m/Y')
                    ->sortable()
                    ->placeholder('Sin vencimiento'),
                
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
                
                SelectFilter::make('almacen')
                    ->relationship('almacen', 'nombre')
                    ->label('Almacén')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}