<?php

namespace App\Filament\Resources\Salidas;

use App\Filament\Resources\Salidas\Pages\CreateSalida;
use App\Filament\Resources\Salidas\Pages\EditSalida;
use App\Filament\Resources\Salidas\Pages\ListSalidas;
use App\Filament\Resources\Salidas\Schemas\SalidaForm;
use App\Filament\Resources\Salidas\Tables\SalidasTable;
use App\Models\Salida;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SalidaResource extends Resource
{
    protected static ?string $model = Salida::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Salida';

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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSalidas::route('/'),
            'create' => CreateSalida::route('/create'),
            'edit' => EditSalida::route('/{record}/edit'),
        ];
    }
}
