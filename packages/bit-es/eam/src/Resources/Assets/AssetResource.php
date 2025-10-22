<?php

namespace Bites\Eam\Resources\Assets;

use BackedEnum;
use Bites\Eam\Models\Asset;
use Bites\Eam\Resources\Assets\Pages\CreateAsset;
use Bites\Eam\Resources\Assets\Pages\EditAsset;
use Bites\Eam\Resources\Assets\Pages\ListAssets;
use Bites\Eam\Resources\Assets\Pages\ViewAsset;
use Bites\Eam\Resources\Assets\Schemas\AssetForm;
use Bites\Eam\Resources\Assets\Schemas\AssetInfolist;
use Bites\Eam\Resources\Assets\Tables\AssetsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::RectangleGroup;

    protected static string|UnitEnum|null $navigationGroup = 'Assets';

    protected static ?string $modelLabel = 'Assets';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'asset_tag';

    public static function form(Schema $schema): Schema
    {
        return AssetForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AssetInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AssetsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            // \Bites\Core\Relations\PropertyRelations::class,
            \Bites\Core\Relations\MetricRelations::class,
            \Bites\Core\Relations\SnapshotRelations::class,
            \Bites\Core\Relations\TaskRelations::class,
            \Bites\Core\Relations\EventRelations::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAssets::route('/'),
            'create' => CreateAsset::route('/create'),
            'view' => ViewAsset::route('/{record}'),
            'edit' => EditAsset::route('/{record}/edit'),
        ];
    }
}
