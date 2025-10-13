<?php

namespace Bites\Erp\Resources\CostCenters;

use BackedEnum;
use Bites\Erp\Models\CostCenter;
use Bites\Erp\Resources\CostCenters\Pages\CreateCostCenter;
use Bites\Erp\Resources\CostCenters\Pages\EditCostCenter;
use Bites\Erp\Resources\CostCenters\Pages\ListCostCenters;
use Bites\Erp\Resources\CostCenters\Schemas\CostCenterForm;
use Bites\Erp\Resources\CostCenters\Tables\CostCentersTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CostCenterResource extends Resource
{
    protected static ?string $model = CostCenter::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCurrencyDollar;

    protected static string|UnitEnum|null $navigationGroup = 'Definitions';

    protected static ?string $modelLabel = 'Cost Centers';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return CostCenterForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CostCentersTable::configure($table);
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
            'index' => ListCostCenters::route('/'),
            'create' => CreateCostCenter::route('/create'),
            'edit' => EditCostCenter::route('/{record}/edit'),
        ];
    }
}
