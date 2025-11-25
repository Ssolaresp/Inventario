<?php

namespace App\Filament\Resources\UnidadMedidas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UnidadMedidaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Ej: Libra, Kilogramo'),
                
                TextInput::make('abreviatura')
                    ->label('Abreviatura')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Ej: lb, kg'),
            ]);
    }
}