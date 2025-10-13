<?php

namespace Bites\Dms\Resources\DmsContainers;

use BackedEnum;
use Bites\Dms\Models\DmsContainer;
use Bites\Dms\Relations;
use Bites\Dms\Resources\DmsContainers\Pages\CreateDmsContainer;
use Bites\Dms\Resources\DmsContainers\Pages\EditDmsContainer;
use Bites\Dms\Resources\DmsContainers\Pages\ListDmsContainers;
use Bites\Dms\Resources\DmsContainers\Schemas\DmsContainerForm;
use Bites\Dms\Resources\DmsContainers\Tables\DmsContainersTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DmsContainerResource extends Resource
{
    protected static ?string $model = DmsContainer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInbox;

    protected static string|UnitEnum|null $navigationGroup = 'Repo';

    protected static ?string $modelLabel = 'Container';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return DmsContainerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DmsContainersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            Relations\FolderRelations::class,
            Relations\FileRelations::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDmsContainers::route('/'),
            'create' => CreateDmsContainer::route('/create'),
            'edit' => EditDmsContainer::route('/{record}/edit'),
        ];
    }
}
