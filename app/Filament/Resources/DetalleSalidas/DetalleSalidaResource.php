<?php

namespace App\Filament\Resources\DetalleSalidas;

use App\Filament\Resources\DetalleSalidas\Pages\CreateDetalleSalida;
use App\Filament\Resources\DetalleSalidas\Pages\EditDetalleSalida;
use App\Filament\Resources\DetalleSalidas\Pages\ListDetalleSalidas;
use App\Filament\Resources\DetalleSalidas\Schemas\DetalleSalidaForm;
use App\Filament\Resources\DetalleSalidas\Tables\DetalleSalidasTable;
use App\Models\DetalleSalida;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DetalleSalidaResource extends Resource
{
    protected static ?string $model = DetalleSalida::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Detalle Salida';

    public static function form(Schema $schema): Schema
    {
        return DetalleSalidaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DetalleSalidasTable::configure($table);
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
            'index' => ListDetalleSalidas::route('/'),
            'create' => CreateDetalleSalida::route('/create'),
            'edit' => EditDetalleSalida::route('/{record}/edit'),
        ];
    }
}
