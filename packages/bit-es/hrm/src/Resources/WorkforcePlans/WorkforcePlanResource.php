<?php

namespace Bites\Hrm\Resources\WorkforcePlans;

use BackedEnum;
use Bites\Hrm\Models\WorkforcePlan;
use Bites\Hrm\Resources\WorkforcePlans\Pages\CreateWorkforcePlan;
use Bites\Hrm\Resources\WorkforcePlans\Pages\EditWorkforcePlan;
use Bites\Hrm\Resources\WorkforcePlans\Pages\ListWorkforcePlans;
use Bites\Hrm\Resources\WorkforcePlans\Schemas\WorkforcePlanForm;
use Bites\Hrm\Resources\WorkforcePlans\Tables\WorkforcePlansTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WorkforcePlanResource extends Resource
{
    protected static ?string $model = WorkforcePlan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return WorkforcePlanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WorkforcePlansTable::configure($table);
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
            'index' => ListWorkforcePlans::route('/'),
            'create' => CreateWorkforcePlan::route('/create'),
            'edit' => EditWorkforcePlan::route('/{record}/edit'),
        ];
    }
}
