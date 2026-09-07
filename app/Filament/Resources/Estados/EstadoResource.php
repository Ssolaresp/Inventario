<?php

namespace App\Filament\Resources\Estados;

use App\Filament\Resources\Estados\Pages\ListEstados;
use App\Filament\Resources\Estados\Tables\EstadosTable;
use App\Models\Estado;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EstadoResource extends Resource
{
    protected static ?string $model = Estado::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCheckCircle;

    protected static string|\UnitEnum|null $navigationGroup = 'Configuración';

    protected static ?string $recordTitleAttribute = 'nombre';

    protected static ?string $navigationLabel = 'Estados';

    protected static ?string $modelLabel = 'Estado';

    protected static ?string $pluralModelLabel = 'Estados';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return EstadosTable::configure($table);
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
            'index' => ListEstados::route('/'),
        ];
    }
}