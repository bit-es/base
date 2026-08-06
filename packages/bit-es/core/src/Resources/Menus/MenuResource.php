<?php

namespace Bites\Core\Resources\Menus;

use BackedEnum;
use Bites\Core\Models\Menu;
use Bites\Core\Resources\Menus\Pages\CreateMenu;
use Bites\Core\Resources\Menus\Pages\EditMenu;
use Bites\Core\Resources\Menus\Pages\ListMenus;
use Bites\Core\Resources\Menus\Schemas\MenuForm;
use Bites\Core\Resources\Menus\Tables\MenusTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static string|BackedEnum|null $navigationIcon = 'myicon-r-menu';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return MenuForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MenusTable::configure($table);
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
            'index' => ListMenus::route('/'),
            'create' => CreateMenu::route('/create'),
            'edit' => EditMenu::route('/{record}/edit'),
        ];
    }
}
