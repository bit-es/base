<?php

namespace Bites\Mes\Resources\ProductionOrders;

use BackedEnum;
use Bites\Mes\Models\ProductionOrder;
use Bites\Mes\Resources\ProductionOrders\Pages\CreateProductionOrder;
use Bites\Mes\Resources\ProductionOrders\Pages\EditProductionOrder;
use Bites\Mes\Resources\ProductionOrders\Pages\ListProductionOrders;
use Bites\Mes\Resources\ProductionOrders\Schemas\ProductionOrderForm;
use Bites\Mes\Resources\ProductionOrders\Tables\ProductionOrdersTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProductionOrderResource extends Resource
{
    protected static ?string $model = ProductionOrder::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProductionOrderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductionOrdersTable::configure($table);
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
            'index' => ListProductionOrders::route('/'),
            'create' => CreateProductionOrder::route('/create'),
            'edit' => EditProductionOrder::route('/{record}/edit'),
        ];
    }
}
