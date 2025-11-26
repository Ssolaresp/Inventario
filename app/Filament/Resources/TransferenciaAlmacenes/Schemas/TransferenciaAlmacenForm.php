<?php

namespace App\Filament\Resources\TransferenciaAlmacenes\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransferenciaAlmacenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('producto_id')
                    ->label('Producto')
                    ->relationship('producto', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),
                
                Select::make('almacen_origen_id')
                    ->label('Almacén Origen')
                    ->relationship('almacenOrigen', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state, callable $get) {
                        // Evitar que origen y destino sean iguales
                        if ($state && $state === $get('almacen_destino_id')) {
                            $set('almacen_destino_id', null);
                        }
                    }),
                
                Select::make('almacen_destino_id')
                    ->label('Almacén Destino')
                    ->relationship('almacenDestino', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state, callable $get) {
                        // Evitar que origen y destino sean iguales
                        if ($state && $state === $get('almacen_origen_id')) {
                            $set('almacen_origen_id', null);
                        }
                    })
                    ->rules([
                        fn (callable $get): \Closure => function (string $attribute, $value, \Closure $fail) use ($get) {
                            if ($value === $get('almacen_origen_id')) {
                                $fail('El almacén destino no puede ser el mismo que el almacén origen.');
                            }
                        },
                    ]),
                
                TextInput::make('cantidad')
                    ->label('Cantidad a Transferir')
                    ->numeric()
                    ->default(1)
                    ->required()
                    ->minValue(1)
                    ->step(1),
                
                DatePicker::make('fecha_transferencia')
                    ->label('Fecha de Transferencia')
                    ->default(now())
                    ->displayFormat('d/m/Y')
                    ->native(false)
                    ->required(),
                
                Textarea::make('observaciones')
                    ->label('Observaciones')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}