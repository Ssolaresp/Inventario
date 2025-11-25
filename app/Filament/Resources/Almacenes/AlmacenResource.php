<?php

namespace App\Filament\Resources\Almacenes;

use App\Filament\Resources\Almacenes\Pages\CreateAlmacen;
use App\Filament\Resources\Almacenes\Pages\EditAlmacen;
use App\Filament\Resources\Almacenes\Pages\ListAlmacenes;
use App\Filament\Resources\Almacenes\Schemas\AlmacenForm;
use App\Filament\Resources\Almacenes\Tables\AlmacenesTable;
use App\Models\Almacen;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class AlmacenResource extends Resource
{
    protected static ?string $model = Almacen::class;

    protected static ?string $recordTitleAttribute = 'nombre';

    protected static ?string $navigationLabel = 'Almacenes';

    protected static ?string $modelLabel = 'Almacén';

    protected static ?string $pluralModelLabel = 'Almacenes';

    public static function form(Schema $schema): Schema
    {
        return AlmacenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AlmacenesTable::configure($table);
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
            'index' => ListAlmacenes::route('/'),
            'create' => CreateAlmacen::route('/create'),
            'edit' => EditAlmacen::route('/{record}/edit'),
        ];
    }
}