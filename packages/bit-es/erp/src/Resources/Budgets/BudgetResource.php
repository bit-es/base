<?php

namespace Bites\Erp\Resources\Budgets;

use Bites\Erp\Resources\Budgets\Pages\CreateBudget;
use Bites\Erp\Resources\Budgets\Pages\EditBudget;
use Bites\Erp\Resources\Budgets\Pages\ListBudgets;
use Bites\Erp\Resources\Budgets\Schemas\BudgetForm;
use Bites\Erp\Resources\Budgets\Tables\BudgetsTable;
use Bites\Erp\Models\Budget;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class BudgetResource extends Resource
{
    protected static ?string $model = Budget::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowsPointingIn;
    protected static string|UnitEnum|null $navigationGroup = 'Planning';
    protected static ?string $modelLabel = 'Budgets';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return BudgetForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BudgetsTable::configure($table);
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
            'index' => ListBudgets::route('/'),
            'create' => CreateBudget::route('/create'),
            'edit' => EditBudget::route('/{record}/edit'),
        ];
    }
}
