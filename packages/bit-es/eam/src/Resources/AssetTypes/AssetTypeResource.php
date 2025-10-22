<?php

namespace Bites\Eam\Resources\AssetTypes;

use BackedEnum;
use Bites\Eam\Models\AssetType;
use Bites\Eam\Resources\AssetTypes\Pages\CreateAssetType;
use Bites\Eam\Resources\AssetTypes\Pages\EditAssetType;
use Bites\Eam\Resources\AssetTypes\Pages\ListAssetTypes;
use Bites\Eam\Resources\AssetTypes\Pages\ViewAssetType;
use Bites\Eam\Resources\AssetTypes\Schemas\AssetTypeForm;
use Bites\Eam\Resources\AssetTypes\Schemas\AssetTypeInfolist;
use Bites\Eam\Resources\AssetTypes\Tables\AssetTypesTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AssetTypeResource extends Resource
{
    protected static ?string $model = AssetType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSwatch;

    protected static string|UnitEnum|null $navigationGroup = 'Assets';

    protected static ?string $modelLabel = 'Types';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return AssetTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AssetTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AssetTypesTable::configure($table);
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
            'index' => ListAssetTypes::route('/'),
            'create' => CreateAssetType::route('/create'),
            'view' => ViewAssetType::route('/{record}'),
            'edit' => EditAssetType::route('/{record}/edit'),
        ];
    }
}
