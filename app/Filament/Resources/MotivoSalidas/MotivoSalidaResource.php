<?php

namespace App\Filament\Resources\MotivoSalidas;

use App\Filament\Resources\MotivoSalidas\Pages\CreateMotivoSalida;
use App\Filament\Resources\MotivoSalidas\Pages\EditMotivoSalida;
use App\Filament\Resources\MotivoSalidas\Pages\ListMotivoSalidas;
use App\Filament\Resources\MotivoSalidas\Schemas\MotivoSalidaForm;
use App\Filament\Resources\MotivoSalidas\Tables\MotivoSalidasTable;
use App\Models\MotivoSalida;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MotivoSalidaResource extends Resource
{
    protected static ?string $model = MotivoSalida::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static string|\UnitEnum|null $navigationGroup = 'Configuración';

    protected static ?string $recordTitleAttribute = 'M.S';

    public static function form(Schema $schema): Schema
    {
        return MotivoSalidaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MotivoSalidasTable::configure($table);
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
            'index' => ListMotivoSalidas::route('/'),
            'create' => CreateMotivoSalida::route('/create'),
            'edit' => EditMotivoSalida::route('/{record}/edit'),
        ];
    }
}