<?php

namespace Bites\Qas\Resources\Methodologies;

use BackedEnum;
use Bites\Qas\Models\Methodology;
use Bites\Qas\Resources\Methodologies\Pages\CreateMethodology;
use Bites\Qas\Resources\Methodologies\Pages\EditMethodology;
use Bites\Qas\Resources\Methodologies\Pages\ListMethodologies;
use Bites\Qas\Resources\Methodologies\Pages\ViewMethodology;
use Bites\Qas\Resources\Methodologies\Schemas\MethodologyForm;
use Bites\Qas\Resources\Methodologies\Schemas\MethodologyInfolist;
use Bites\Qas\Resources\Methodologies\Tables\MethodologiesTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MethodologyResource extends Resource
{
    protected static ?string $model = Methodology::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return MethodologyForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MethodologyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MethodologiesTable::configure($table);
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
            'index' => ListMethodologies::route('/'),
            'create' => CreateMethodology::route('/create'),
            'view' => ViewMethodology::route('/{record}'),
            'edit' => EditMethodology::route('/{record}/edit'),
        ];
    }
}
