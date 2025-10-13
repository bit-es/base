<?php

namespace Bites\Erp\Resources\CostElements;

use Bites\Erp\Resources\CostElements\Pages\CreateCostElement;
use Bites\Erp\Resources\CostElements\Pages\EditCostElement;
use Bites\Erp\Resources\CostElements\Pages\ListCostElements;
use Bites\Erp\Resources\CostElements\Schemas\CostElementForm;
use Bites\Erp\Resources\CostElements\Tables\CostElementsTable;
use Bites\Erp\Models\CostElement;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CostElementResource extends Resource
{
    protected static ?string $model = CostElement::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;
    protected static string|UnitEnum|null $navigationGroup = 'Definitions';
    protected static ?string $modelLabel = 'Cost Elements';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return CostElementForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CostElementsTable::configure($table);
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
            'index' => ListCostElements::route('/'),
            'create' => CreateCostElement::route('/create'),
            'edit' => EditCostElement::route('/{record}/edit'),
        ];
    }
}
