<?php

namespace Bites\Eam\Resources\Assets;

use BackedEnum;
use Bites\Eam\Models\Asset;
use Bites\Eam\Resources\Assets\Schemas\AssetForm;
use Bites\Eam\Resources\Assets\Tables\AssetsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCube;

    // protected static string|UnitEnum|null $navigationGroup = '';
    protected static ?string $modelLabel = 'Assets & Equipments';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return AssetForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AssetsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            \Bites\Core\Relations\PropertyRelations::class,
            \Bites\Core\Relations\MetricRelations::class,
            \Bites\Core\Relations\SnapshotRelations::class,
            \Bites\Core\Relations\TaskRelations::class,
            \Bites\Core\Relations\EventRelations::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssets::route('/'),
            'create' => Pages\CreateAsset::route('/create'),
            'edit' => Pages\EditAsset::route('/{record}/edit'),
        ];
    }
}
