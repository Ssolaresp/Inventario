<?php

namespace App\Filament\Resources\Salidas;

use App\Filament\Resources\Salidas\Pages\CreateSalida;
use App\Filament\Resources\Salidas\Pages\EditSalida;
use App\Filament\Resources\Salidas\Pages\ListSalidas;
use App\Filament\Resources\Salidas\Pages\ViewSalida;
use App\Filament\Resources\Salidas\Schemas\SalidaForm;
use App\Filament\Resources\Salidas\Tables\SalidasTable;
use App\Filament\Resources\Salidas\RelationManagers\DetallesRelationManager;
use App\Models\Salida;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class SalidaResource extends Resource
{
    protected static ?string $model = Salida::class;

    protected static ?string $navigationLabel = 'Salidas';

    protected static ?string $modelLabel = 'Salida';

    protected static ?string $pluralModelLabel = 'Salidas';

    public static function form(Schema $schema): Schema
    {
        return SalidaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SalidasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            DetallesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSalidas::route('/'),
            'create' => CreateSalida::route('/create'),
            'view' => ViewSalida::route('/{record}'),
            'edit' => EditSalida::route('/{record}/edit'),
        ];
    }
}