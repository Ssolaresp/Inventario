<?php

namespace App\Filament\Resources\Almacenes\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AlmacenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->label('Nombre del Almacén')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                
                TextInput::make('encargado')
                    ->label('Encargado')
                    ->maxLength(255),
                
                Select::make('estado_id')
                    ->label('Estado')
                    ->relationship('estado', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required(),
                
                TextInput::make('telefono')
                    ->label('Teléfono')
                    ->tel()
                    ->maxLength(255),
                
                Textarea::make('direccion')
                    ->label('Dirección')
                    ->rows(3)
                    ->columnSpanFull(),
                
                Select::make('departamento_id')
                    ->label('Departamento')
                    ->relationship('departamento', 'nombre')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn (callable $set) => $set('municipio_id', null))
                    ->createOptionForm([
                        TextInput::make('nombre')
                            ->label('Nombre del Departamento')
                            ->required()
                            ->maxLength(255),
                    ]),
                
                Select::make('municipio_id')
                    ->label('Municipio')
                    ->relationship('municipio', 'nombre', fn ($query, callable $get) => 
                        $query->when($get('departamento_id'), fn ($q, $deptId) => 
                            $q->where('departamento_id', $deptId)
                        )
                    )
                    ->searchable()
                    ->preload()
                    ->required()
                    ->disabled(fn (callable $get) => !$get('departamento_id'))
                    ->createOptionForm([
                        TextInput::make('nombre')
                            ->label('Nombre del Municipio')
                            ->required()
                            ->maxLength(255),
                        Select::make('departamento_id')
                            ->label('Departamento')
                            ->relationship('departamento', 'nombre')
                            ->required(),
                    ]),
            ]);
    }
}