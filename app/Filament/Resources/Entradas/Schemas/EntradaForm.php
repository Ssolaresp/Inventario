<?php

namespace App\Filament\Resources\Entradas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EntradaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('numero_entrada')
                    ->label('Número de Entrada')
                    ->disabled()
                    ->dehydrated()
                    ->placeholder('Se generará automáticamente')
                    ->columnSpanFull(),

                Select::make('almacen_id')
                    ->label('Almacén')
                    ->relationship('almacen', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload(),

                Select::make('motivo_entrada_id')
                    ->label('Motivo de Entrada')
                    ->relationship('motivoEntrada', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload(),

                DatePicker::make('fecha_entrada')
                    ->label('Fecha de Entrada')
                    ->required()
                    ->default(now())
                    ->native(false)
                    ->displayFormat('d/m/Y'),

                Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'Pendiente' => 'Pendiente',
                        'Procesada' => 'Procesada',
                        'Cancelada' => 'Cancelada',
                    ])
                    ->default('pendiente')
                    ->required(),

                Textarea::make('observaciones')
                    ->label('Observaciones')
                    ->maxLength(1000)
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
