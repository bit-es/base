<?php

namespace Bites\Dms\Resources\DmsFiles;

use BackedEnum;
use Bites\Dms\Models\DmsFile;
use Bites\Dms\Resources\DmsFiles\Pages\CreateDmsFile;
use Bites\Dms\Resources\DmsFiles\Pages\EditDmsFile;
use Bites\Dms\Resources\DmsFiles\Pages\ListDmsFiles;
use Bites\Dms\Resources\DmsFiles\Schemas\DmsFileForm;
use Bites\Dms\Resources\DmsFiles\Tables\DmsFilesTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DmsFileResource extends Resource
{
    protected static ?string $model = DmsFile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocument;

    protected static string|UnitEnum|null $navigationGroup = 'Repo';

    protected static ?string $modelLabel = 'Files';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return DmsFileForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DmsFilesTable::configure($table);
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
            'index' => ListDmsFiles::route('/'),
            'create' => CreateDmsFile::route('/create'),
            'edit' => EditDmsFile::route('/{record}/edit'),
        ];
    }
}
