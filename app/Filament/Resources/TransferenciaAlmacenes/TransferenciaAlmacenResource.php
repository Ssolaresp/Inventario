<?php

namespace App\Filament\Resources\TransferenciaAlmacenes;

use App\Filament\Resources\TransferenciaAlmacenes\Pages\CreateTransferenciaAlmacen;
use App\Filament\Resources\TransferenciaAlmacenes\Pages\EditTransferenciaAlmacen;
use App\Filament\Resources\TransferenciaAlmacenes\Pages\ListTransferenciaAlmacenes;
use App\Filament\Resources\TransferenciaAlmacenes\Schemas\TransferenciaAlmacenForm;
use App\Filament\Resources\TransferenciaAlmacenes\Tables\TransferenciaAlmacenesTable;
use App\Models\TransferenciaAlmacen;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class TransferenciaAlmacenResource extends Resource
{
    protected static ?string $model = TransferenciaAlmacen::class;

  

    protected static ?string $navigationLabel = 'Transferencias';

    protected static ?string $modelLabel = 'Transferencia';

    protected static ?string $pluralModelLabel = 'Transferencias';

    public static function form(Schema $schema): Schema
    {
        return TransferenciaAlmacenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransferenciaAlmacenesTable::configure($table);
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
            'index' => ListTransferenciaAlmacenes::route('/'),
            'create' => CreateTransferenciaAlmacen::route('/create'),
            'edit' => EditTransferenciaAlmacen::route('/{record}/edit'),
        ];
    }
}