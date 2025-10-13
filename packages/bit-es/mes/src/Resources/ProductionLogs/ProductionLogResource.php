<?php

namespace Bites\Mes\Resources\ProductionLogs;

use Bites\Mes\Resources\ProductionLogs\Pages\CreateProductionLog;
use Bites\Mes\Resources\ProductionLogs\Pages\EditProductionLog;
use Bites\Mes\Resources\ProductionLogs\Pages\ListProductionLogs;
use Bites\Mes\Resources\ProductionLogs\Schemas\ProductionLogForm;
use Bites\Mes\Resources\ProductionLogs\Tables\ProductionLogsTable;
use Bites\Mes\Models\ProductionLog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProductionLogResource extends Resource
{
    protected static ?string $model = ProductionLog::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProductionLogForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductionLogsTable::configure($table);
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
            'index' => ListProductionLogs::route('/'),
            'create' => CreateProductionLog::route('/create'),
            'edit' => EditProductionLog::route('/{record}/edit'),
        ];
    }
}
