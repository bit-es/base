<?php

namespace Bites\Core\Resources\FilaPanels;

use Bites\Core\Resources\FilaPanels\Pages\CreateFilaPanel;
use Bites\Core\Resources\FilaPanels\Pages\EditFilaPanel;
use Bites\Core\Resources\FilaPanels\Pages\ListFilaPanels;
use Bites\Core\Resources\FilaPanels\Schemas\FilaPanelForm;
use Bites\Core\Resources\FilaPanels\Tables\FilaPanelsTable;
use Bites\Core\Models\FilaPanel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
class FilaPanelResource extends Resource
{
    protected static ?string $model = FilaPanel::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSwatch;
    protected static string|UnitEnum|null $navigationGroup = 'Setup';
    protected static ?string $modelLabel = 'Panels';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return FilaPanelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FilaPanelsTable::configure($table);
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
            'index' => ListFilaPanels::route('/'),
            'create' => CreateFilaPanel::route('/create'),
            'edit' => EditFilaPanel::route('/{record}/edit'),
        ];
    }
}
