<?php

namespace App\Filament\Resources\ProductoAlmacenes\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductoAlmacenForm
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
                    ->required(),
                
                Select::make('almacen_id')
                    ->label('Almacén')
                    ->relationship('almacen', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),
                
                TextInput::make('stock_inicial')
                    ->label('Stock Inicial')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->minValue(0)
                    ->step(1),
                
                TextInput::make('stock_minimo')
                    ->label('Stock Mínimo')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->minValue(0)
                    ->step(1),
                
                TextInput::make('stock_maximo')
                    ->label('Stock Máximo')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->minValue(0)
                    ->step(1),
                
                DatePicker::make('fecha_vencimiento')
                    ->label('Fecha de Vencimiento')
                    ->displayFormat('d/m/Y')
                    ->native(false)
                    ->columnSpanFull(),
            ]);
    }
}