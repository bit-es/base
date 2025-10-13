<?php

namespace Bites\Eam\Resources\MaintenancePlans;

use Bites\Eam\Resources\MaintenancePlans\Pages\CreateMaintenancePlan;
use Bites\Eam\Resources\MaintenancePlans\Pages\EditMaintenancePlan;
use Bites\Eam\Resources\MaintenancePlans\Pages\ListMaintenancePlans;
use Bites\Eam\Resources\MaintenancePlans\Schemas\MaintenancePlanForm;
use Bites\Eam\Resources\MaintenancePlans\Tables\MaintenancePlansTable;
use Bites\Eam\Models\MaintenancePlan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class MaintenancePlanResource extends Resource
{
    protected static ?string $model = MaintenancePlan::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;
    protected static string|UnitEnum|null $navigationGroup = 'Maintenance';
    protected static ?string $modelLabel = 'Plans';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return MaintenancePlanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MaintenancePlansTable::configure($table);
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
            'index' => ListMaintenancePlans::route('/'),
            'create' => CreateMaintenancePlan::route('/create'),
            'edit' => EditMaintenancePlan::route('/{record}/edit'),
        ];
    }
}
