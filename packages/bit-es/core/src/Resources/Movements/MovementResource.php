<?php

namespace Bites\Core\Resources\Movements;

use App\Models\Movement;
use BackedEnum;
use Bites\Core\Resources\Movements\Pages\CreateMovement;
use Bites\Core\Resources\Movements\Pages\EditMovement;
use Bites\Core\Resources\Movements\Pages\ListMovements;
use Bites\Core\Resources\Movements\Schemas\MovementForm;
use Bites\Core\Resources\Movements\Tables\MovementsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MovementResource extends Resource
{
    protected static ?string $model = Movement::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return MovementForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MovementsTable::configure($table);
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
            'index' => ListMovements::route('/'),
            'create' => CreateMovement::route('/create'),
            'edit' => EditMovement::route('/{record}/edit'),
        ];
    }
}
