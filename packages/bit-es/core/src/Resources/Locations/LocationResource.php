<?php

namespace Bites\Core\Resources\Locations;

use Bites\Core\Resources\Locations\Pages\CreateLocation;
use Bites\Core\Resources\Locations\Pages\EditLocation;
use Bites\Core\Resources\Locations\Pages\ListLocations;
use Bites\Core\Resources\Locations\Schemas\LocationForm;
use Bites\Core\Resources\Locations\Tables\LocationsTable;
use Bites\Core\Models\Location;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-c-floorplan';
    protected static string|UnitEnum|null $navigationGroup = 'Organization Structure';
    protected static ?string $modelLabel = 'Locations';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return LocationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LocationsTable::configure($table);
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
            'index' => ListLocations::route('/'),
            'create' => CreateLocation::route('/create'),
            'edit' => EditLocation::route('/{record}/edit'),
        ];
    }
}
