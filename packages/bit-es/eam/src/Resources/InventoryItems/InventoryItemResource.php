<?php

namespace Bites\Eam\Resources\InventoryItems;

use BackedEnum;
use Bites\Eam\Models\InventoryItem;
use Bites\Eam\Resources\InventoryItems\Pages\CreateInventoryItem;
use Bites\Eam\Resources\InventoryItems\Pages\EditInventoryItem;
use Bites\Eam\Resources\InventoryItems\Pages\ListInventoryItems;
use Bites\Eam\Resources\InventoryItems\Schemas\InventoryItemForm;
use Bites\Eam\Resources\InventoryItems\Tables\InventoryItemsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class InventoryItemResource extends Resource
{
    protected static ?string $model = InventoryItem::class;

    protected static string|BackedEnum|null $navigationIcon = 'myicon-c-warehouse';

    // protected static string|UnitEnum|null $navigationGroup = 'Materials Management';

    protected static ?string $modelLabel = 'Inventory';

    protected static ?int $navigationSort = 4;

    protected static ?string $recordTitleAttribute = 'itemnum';

    public static function form(Schema $schema): Schema
    {
        return InventoryItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InventoryItemsTable::configure($table);
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
            'index' => ListInventoryItems::route('/'),
            'create' => CreateInventoryItem::route('/create'),
            'edit' => EditInventoryItem::route('/{record}/edit'),
        ];
    }
}
