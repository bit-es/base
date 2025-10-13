<?php

namespace Bites\Core\Resources\OrgUnits;

use Bites\Core\Resources\OrgUnits\Pages\CreateOrgUnit;
use Bites\Core\Resources\OrgUnits\Pages\EditOrgUnit;
use Bites\Core\Resources\OrgUnits\Pages\ListOrgUnits;
use Bites\Core\Resources\OrgUnits\Schemas\OrgUnitForm;
use Bites\Core\Resources\OrgUnits\Tables\OrgUnitsTable;
use Bites\Core\Models\OrgUnit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class OrgUnitResource extends Resource
{
    protected static ?string $model = OrgUnit::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleGroup;
    protected static string|UnitEnum|null $navigationGroup = 'Organization Structure';
    protected static ?string $modelLabel = 'Units';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return OrgUnitForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrgUnitsTable::configure($table);
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
            'index' => ListOrgUnits::route('/'),
            'create' => CreateOrgUnit::route('/create'),
            'edit' => EditOrgUnit::route('/{record}/edit'),
        ];
    }
}
