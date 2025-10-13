<?php

namespace Bites\Dms\Resources\DmsFolders;

use BackedEnum;
use Bites\Dms\Models\DmsFolder;
use Bites\Dms\Relations;
use Bites\Dms\Resources\DmsFolders\Pages\CreateDmsFolder;
use Bites\Dms\Resources\DmsFolders\Pages\EditDmsFolder;
use Bites\Dms\Resources\DmsFolders\Pages\ListDmsFolders;
use Bites\Dms\Resources\DmsFolders\Schemas\DmsFolderForm;
use Bites\Dms\Resources\DmsFolders\Tables\DmsFoldersTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DmsFolderResource extends Resource
{
    protected static ?string $model = DmsFolder::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolderOpen;

    protected static string|UnitEnum|null $navigationGroup = 'Repo';

    protected static ?string $modelLabel = 'Folders';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return DmsFolderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DmsFoldersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            Relations\FileRelations::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDmsFolders::route('/'),
            'create' => CreateDmsFolder::route('/create'),
            'edit' => EditDmsFolder::route('/{record}/edit'),
        ];
    }
}
