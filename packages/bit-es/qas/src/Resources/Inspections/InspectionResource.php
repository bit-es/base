<?php

namespace Bites\Qas\Resources\Inspections;

use BackedEnum;
use Bites\Qas\Models\Inspection;
use Bites\Qas\Resources\Inspections\Pages\CreateInspection;
use Bites\Qas\Resources\Inspections\Pages\EditInspection;
use Bites\Qas\Resources\Inspections\Pages\ListInspections;
use Bites\Qas\Resources\Inspections\Schemas\InspectionForm;
use Bites\Qas\Resources\Inspections\Tables\InspectionsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InspectionResource extends Resource
{
    protected static ?string $model = Inspection::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return InspectionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InspectionsTable::configure($table);
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
            'index' => ListInspections::route('/'),
            'create' => CreateInspection::route('/create'),
            'edit' => EditInspection::route('/{record}/edit'),
        ];
    }
}
