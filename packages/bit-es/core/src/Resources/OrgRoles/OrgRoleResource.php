<?php

namespace Bites\Core\Resources\OrgRoles;

use Bites\Core\Resources\OrgRoles\Pages\CreateOrgRole;
use Bites\Core\Resources\OrgRoles\Pages\EditOrgRole;
use Bites\Core\Resources\OrgRoles\Pages\ListOrgRoles;
use Bites\Core\Resources\OrgRoles\Schemas\OrgRoleForm;
use Bites\Core\Resources\OrgRoles\Tables\OrgRolesTable;
use Bites\Core\Models\OrgRole;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class OrgRoleResource extends Resource
{
    protected static ?string $model = OrgRole::class;
    protected static string|BackedEnum|null $navigationIcon = ('myicon-c-orgrole');
    protected static string|UnitEnum|null $navigationGroup = 'Organization Structure';
    protected static ?string $modelLabel = 'Roles';
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return OrgRoleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrgRolesTable::configure($table);
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
            'index' => ListOrgRoles::route('/'),
            'create' => CreateOrgRole::route('/create'),
            'edit' => EditOrgRole::route('/{record}/edit'),
        ];
    }
}
