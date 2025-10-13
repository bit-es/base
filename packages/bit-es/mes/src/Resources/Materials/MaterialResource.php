<?php

namespace Bites\Mes\Resources\Materials;

use Bites\Mes\Resources\Materials\Pages\CreateMaterial;
use Bites\Mes\Resources\Materials\Pages\EditMaterial;
use Bites\Mes\Resources\Materials\Pages\ListMaterials;
use Bites\Mes\Resources\Materials\Schemas\MaterialForm;
use Bites\Mes\Resources\Materials\Tables\MaterialsTable;
use Bites\Mes\Models\Material;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return MaterialForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MaterialsTable::configure($table);
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
            'index' => ListMaterials::route('/'),
            'create' => CreateMaterial::route('/create'),
            'edit' => EditMaterial::route('/{record}/edit'),
        ];
    }
}
