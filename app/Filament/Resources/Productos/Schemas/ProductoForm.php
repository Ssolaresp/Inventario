<?php

namespace App\Filament\Resources\Productos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->label('Nombre del Producto')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                
                Select::make('categoria_id')
                    ->label('Categoría')
                    ->relationship('categoria', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('nombre')
                            ->label('Nombre de la Categoría')
                            ->required()
                            ->maxLength(255),
                    ]),
                
                Select::make('unidad_medida_id')
                    ->label('Unidad de Medida')
                    ->relationship('unidadMedida', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('nombre')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('abreviatura')
                            ->label('Abreviatura')
                            ->required()
                            ->maxLength(255),
                    ]),
                
                Select::make('proveedor_id')
                    ->label('Proveedor')
                    ->relationship('proveedor', 'nombre')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('nombre')
                            ->label('Nombre del Proveedor')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('nit')
                            ->label('NIT')
                            ->required()
                            ->maxLength(255),
                    ]),
            ]);
    }
}