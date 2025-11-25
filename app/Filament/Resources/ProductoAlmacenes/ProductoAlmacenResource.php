<?php

namespace App\Filament\Resources\ProductoAlmacenes;

use App\Filament\Resources\ProductoAlmacenes\Pages\CreateProductoAlmacen;
use App\Filament\Resources\ProductoAlmacenes\Pages\EditProductoAlmacen;
use App\Filament\Resources\ProductoAlmacenes\Pages\ListProductoAlmacenes;
use App\Filament\Resources\ProductoAlmacenes\Schemas\ProductoAlmacenForm;
use App\Filament\Resources\ProductoAlmacenes\Tables\ProductoAlmacenesTable;
use App\Models\ProductoAlmacen;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ProductoAlmacenResource extends Resource
{
    protected static ?string $model = ProductoAlmacen::class;

    

    protected static ?string $navigationLabel = 'Inventario';

    protected static ?string $modelLabel = 'Producto en Almacén';

    protected static ?string $pluralModelLabel = 'Inventario';

    public static function form(Schema $schema): Schema
    {
        return ProductoAlmacenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductoAlmacenesTable::configure($table);
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
            'index' => ListProductoAlmacenes::route('/'),
            'create' => CreateProductoAlmacen::route('/create'),
            'edit' => EditProductoAlmacen::route('/{record}/edit'),
        ];
    }
}