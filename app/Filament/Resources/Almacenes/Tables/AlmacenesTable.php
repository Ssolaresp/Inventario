<?php

namespace App\Filament\Resources\Almacenes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AlmacenesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('encargado')
                    ->label('Encargado')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('telefono')
                    ->label('Teléfono')
                    ->searchable(),
                TextColumn::make('direccion')
                    ->label('Dirección')
                    ->searchable()
                    ->limit(50),
                TextColumn::make('municipio.nombre')
                    ->label('Municipio')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('departamento.nombre')
                    ->label('Departamento')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('estado.nombre')
                    ->label('Estado')
                    ->badge()
                    ->searchable()
                    ->sortable(),
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
                SelectFilter::make('departamento')
                    ->relationship('departamento', 'nombre')
                    ->label('Departamento')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('municipio')
                    ->relationship('municipio', 'nombre')
                    ->label('Municipio')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('estado')
                    ->relationship('estado', 'nombre')
                    ->label('Estado')
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