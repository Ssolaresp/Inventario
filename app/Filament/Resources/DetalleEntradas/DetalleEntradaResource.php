<?php

namespace App\Filament\Resources\DetalleEntradas;

use App\Filament\Resources\DetalleEntradas\Pages\CreateDetalleEntrada;
use App\Filament\Resources\DetalleEntradas\Pages\EditDetalleEntrada;
use App\Filament\Resources\DetalleEntradas\Pages\ListDetalleEntradas;
use App\Filament\Resources\DetalleEntradas\Schemas\DetalleEntradaForm;
use App\Filament\Resources\DetalleEntradas\Tables\DetalleEntradasTable;
use App\Models\DetalleEntrada;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DetalleEntradaResource extends Resource
{
    protected static ?string $model = DetalleEntrada::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;

    protected static string|\UnitEnum|null $navigationGroup = 'Movimientos';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $recordTitleAttribute = 'Detalle Entrada';

    public static function form(Schema $schema): Schema
    {
        return DetalleEntradaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DetalleEntradasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDetalleEntradas::route('/'),
            'create' => CreateDetalleEntrada::route('/create'),
            'edit' => EditDetalleEntrada::route('/{record}/edit'),
        ];
    }
}