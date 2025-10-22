<?php

namespace Bites\Eam\Resources\WorkOrders;

use BackedEnum;
use Bites\Eam\Models\WorkOrder;
use Bites\Eam\Resources\WorkOrders\Pages\CreateWorkOrder;
use Bites\Eam\Resources\WorkOrders\Pages\EditWorkOrder;
use Bites\Eam\Resources\WorkOrders\Pages\ListWorkOrders;
use Bites\Eam\Resources\WorkOrders\Pages\ViewWorkOrder;
use Bites\Eam\Resources\WorkOrders\Schemas\WorkOrderForm;
use Bites\Eam\Resources\WorkOrders\Schemas\WorkOrderInfolist;
use Bites\Eam\Resources\WorkOrders\Tables\WorkOrdersTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class WorkOrderResource extends Resource
{
    protected static ?string $model = WorkOrder::class;

    protected static string|BackedEnum|null $navigationIcon = 'myicon-c-work-order';

    protected static string|UnitEnum|null $navigationGroup = 'Maintenance';

    protected static ?string $modelLabel = 'Work Orders';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'wonum';

    public static function form(Schema $schema): Schema
    {
        return WorkOrderForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WorkOrderInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WorkOrdersTable::configure($table);
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
            'index' => ListWorkOrders::route('/'),
            'create' => CreateWorkOrder::route('/create'),
            'view' => ViewWorkOrder::route('/{record}'),
            'edit' => EditWorkOrder::route('/{record}/edit'),
        ];
    }
}
