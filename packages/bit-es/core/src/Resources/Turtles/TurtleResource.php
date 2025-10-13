<?php

namespace Bites\Core\Resources\Turtles;

use BackedEnum;
use Bites\Core\Models\Turtle;
use Bites\Core\Resources\Turtles\Pages\CreateTurtle;
use Bites\Core\Resources\Turtles\Pages\EditTurtle;
use Bites\Core\Resources\Turtles\Pages\ListTurtles;
use Bites\Core\Resources\Turtles\Pages\ViewTurtle;
use Bites\Core\Resources\Turtles\Schemas\TurtleForm;
use Bites\Core\Resources\Turtles\Schemas\TurtleInfolist;
use Bites\Core\Resources\Turtles\Tables\TurtlesTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class TurtleResource extends Resource
{
    protected static ?string $model = Turtle::class;

    protected static string|BackedEnum|null $navigationIcon = 'myicon-c-turtle';

    protected static string|UnitEnum|null $navigationGroup = 'Process Framework';

    protected static ?string $modelLabel = 'Turtles';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return TurtleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TurtleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TurtlesTable::configure($table);
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
            'index' => ListTurtles::route('/'),
            'create' => CreateTurtle::route('/create'),
            'view' => ViewTurtle::route('/{record}'),
            'edit' => EditTurtle::route('/{record}/edit'),
        ];
    }
}
