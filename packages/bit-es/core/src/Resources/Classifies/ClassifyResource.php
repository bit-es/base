<?php

namespace Bites\Core\Resources\Classifies;

use Bites\Core\Resources\Classifies\Pages\CreateClassify;
use Bites\Core\Resources\Classifies\Pages\EditClassify;
use Bites\Core\Resources\Classifies\Pages\ListClassifies;
use Bites\Core\Resources\Classifies\Schemas\ClassifyForm;
use Bites\Core\Resources\Classifies\Tables\ClassifiesTable;
use Bites\Core\Models\Classify;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ClassifyResource extends Resource
{
    protected static ?string $model = Classify::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;
    protected static string|UnitEnum|null $navigationGroup = 'Configuration';
    protected static ?string $modelLabel = 'Classifications';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return ClassifyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClassifiesTable::configure($table);
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
            'index' => ListClassifies::route('/'),
            'create' => CreateClassify::route('/create'),
            'edit' => EditClassify::route('/{record}/edit'),
        ];
    }
}
