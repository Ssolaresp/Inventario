<?php

namespace App\Filament\Resources\Salidas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SalidaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('numero_salida')
                    ->label('Número de Salida')
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

                Select::make('motivo_salida_id') // CAMBIAR A SINGULAR
                    ->label('Motivo de Salida')
                    ->relationship('motivoSalida', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload(),

                DatePicker::make('fecha_salida')
                    ->label('Fecha de Salida')
                    ->required()
                    ->default(now())
                    ->native(false)
                    ->displayFormat('d/m/Y'),

                Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'pendiente' => 'Pendiente',
                        'procesada' => 'Procesada',
                        'cancelada' => 'Cancelada',
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