<?php

namespace Bites\Eam\Resources\SpareParts;

use BackedEnum;
use Bites\Eam\Models\SparePart;
use Bites\Eam\Resources\SpareParts\Pages\CreateSparePart;
use Bites\Eam\Resources\SpareParts\Pages\EditSparePart;
use Bites\Eam\Resources\SpareParts\Pages\ListSpareParts;
use Bites\Eam\Resources\SpareParts\Schemas\SparePartForm;
use Bites\Eam\Resources\SpareParts\Tables\SparePartsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class SparePartResource extends Resource
{
    protected static ?string $model = SparePart::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog;

    protected static string|UnitEnum|null $navigationGroup = 'Maintenance';

    protected static ?string $modelLabel = 'Spare Parts';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return SparePartForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SparePartsTable::configure($table);
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
            'index' => ListSpareParts::route('/'),
            'create' => CreateSparePart::route('/create'),
            'edit' => EditSparePart::route('/{record}/edit'),
        ];
    }
}
