<?php

namespace Bites\Mes\Resources\WorkCenters;

use Bites\Mes\Resources\WorkCenters\Pages\CreateWorkCenter;
use Bites\Mes\Resources\WorkCenters\Pages\EditWorkCenter;
use Bites\Mes\Resources\WorkCenters\Pages\ListWorkCenters;
use Bites\Mes\Resources\WorkCenters\Schemas\WorkCenterForm;
use Bites\Mes\Resources\WorkCenters\Tables\WorkCentersTable;
use Bites\Mes\Models\WorkCenter;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WorkCenterResource extends Resource
{
    protected static ?string $model = WorkCenter::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return WorkCenterForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WorkCentersTable::configure($table);
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
            'index' => ListWorkCenters::route('/'),
            'create' => CreateWorkCenter::route('/create'),
            'edit' => EditWorkCenter::route('/{record}/edit'),
        ];
    }
}
