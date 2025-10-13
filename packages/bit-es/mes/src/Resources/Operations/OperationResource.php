<?php

namespace Bites\Mes\Resources\Operations;

use Bites\Mes\Resources\Operations\Pages\CreateOperation;
use Bites\Mes\Resources\Operations\Pages\EditOperation;
use Bites\Mes\Resources\Operations\Pages\ListOperations;
use Bites\Mes\Resources\Operations\Schemas\OperationForm;
use Bites\Mes\Resources\Operations\Tables\OperationsTable;
use Bites\Mes\Models\Operation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OperationResource extends Resource
{
    protected static ?string $model = Operation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return OperationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OperationsTable::configure($table);
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
            'index' => ListOperations::route('/'),
            'create' => CreateOperation::route('/create'),
            'edit' => EditOperation::route('/{record}/edit'),
        ];
    }
}
