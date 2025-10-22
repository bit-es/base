<?php

namespace Bites\Eam\Resources\PurchaseOrders;

use BackedEnum;
use Bites\Eam\Models\PurchaseOrder;
use Bites\Eam\Resources\PurchaseOrders\Pages\CreatePurchaseOrder;
use Bites\Eam\Resources\PurchaseOrders\Pages\EditPurchaseOrder;
use Bites\Eam\Resources\PurchaseOrders\Pages\ListPurchaseOrders;
use Bites\Eam\Resources\PurchaseOrders\Schemas\PurchaseOrderForm;
use Bites\Eam\Resources\PurchaseOrders\Tables\PurchaseOrdersTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class PurchaseOrderResource extends Resource
{
    protected static ?string $model = PurchaseOrder::class;

    protected static string|BackedEnum|null $navigationIcon = 'myicon-c-po';

    protected static string|UnitEnum|null $navigationGroup = 'Acquisition';

    protected static ?string $modelLabel = 'Purchase Orders';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'ponum';

    public static function form(Schema $schema): Schema
    {
        return PurchaseOrderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PurchaseOrdersTable::configure($table);
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
            'index' => ListPurchaseOrders::route('/'),
            'create' => CreatePurchaseOrder::route('/create'),
            'edit' => EditPurchaseOrder::route('/{record}/edit'),
        ];
    }
}
