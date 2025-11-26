<?php

namespace App\Filament\Resources\MotivoEntradas;

use App\Filament\Resources\MotivoEntradas\Pages\CreateMotivoEntrada;
use App\Filament\Resources\MotivoEntradas\Pages\EditMotivoEntrada;
use App\Filament\Resources\MotivoEntradas\Pages\ListMotivoEntradas;
use App\Filament\Resources\MotivoEntradas\Schemas\MotivoEntradaForm;
use App\Filament\Resources\MotivoEntradas\Tables\MotivoEntradasTable;
use App\Models\MotivoEntrada;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MotivoEntradaResource extends Resource
{
    protected static ?string $model = MotivoEntrada::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'M.E';

    public static function form(Schema $schema): Schema
    {
        return MotivoEntradaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MotivoEntradasTable::configure($table);
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
            'index' => ListMotivoEntradas::route('/'),
            'create' => CreateMotivoEntrada::route('/create'),
            'edit' => EditMotivoEntrada::route('/{record}/edit'),
        ];
    }
}
