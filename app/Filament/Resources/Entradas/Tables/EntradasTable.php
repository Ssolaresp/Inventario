<?php

namespace App\Filament\Resources\Entradas\Tables;

use Filament\Actions\BulkActionGroup;
/*
use Filament\Actions\DeleteAction;
*/
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EntradasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('numero_entrada')
                    ->label('N° Entrada')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold'),

                TextColumn::make('almacen.nombre')
                    ->label('Almacén')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('motivoEntrada.nombre')
                    ->label('Motivo')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('fecha_entrada')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable()
                    ->toggleable(),

                BadgeColumn::make('estado')
                    ->label('Estado')
                    ->colors([
                        'warning' => 'Pendiente',
                        'success' => 'Procesada',
                        'danger' => 'Cancelada',
                    ])
                    ->icons([
                        'heroicon-o-clock' => 'Pendiente',
                        'heroicon-o-check-circle' => 'Procesada',
                        'heroicon-o-x-circle' => 'Cancelada',
                    ]),

                TextColumn::make('detalles_count')
                    ->label('Productos')
                    ->counts('detalles')
                    ->badge()
                    ->color('info')
                    ->toggleable(),

                TextColumn::make('usuario.name')
                    ->label('Usuario')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('almacen_id')
                    ->label('Almacén')
                    ->relationship('almacen', 'nombre')
                    ->preload()
                    ->searchable(),

                SelectFilter::make('motivo_entrada_id')
                    ->label('Motivo')
                    ->relationship('motivoEntrada', 'nombre')
                    ->preload()
                    ->searchable(),

                SelectFilter::make('estado')
                    ->label('Estado')
                    ->options([
                        'Pendiente' => 'Pendiente',
                        'Procesada' => 'Procesada',
                        'Cancelada' => 'Cancelada',
                    ]),

                Filter::make('fecha_entrada')
                    ->form([
                        DatePicker::make('desde')
                            ->label('Desde'),
                        DatePicker::make('hasta')
                            ->label('Hasta'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['desde'],
                                fn (Builder $query, $date): Builder => $query->whereDate('fecha_entrada', '>=', $date),
                            )
                            ->when(
                                $data['hasta'],
                                fn (Builder $query, $date): Builder => $query->whereDate('fecha_entrada', '<=', $date),
                            );
                    }),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                /*
                DeleteAction::make(),
                */
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
