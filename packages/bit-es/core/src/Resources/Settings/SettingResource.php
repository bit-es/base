<?php

namespace Bites\Core\Resources\Settings;

use BackedEnum;
use Bites\Core\Models\Setting;
use Bites\Core\Resources\Settings\Pages\CreateSetting;
use Bites\Core\Resources\Settings\Pages\EditSetting;
use Bites\Core\Resources\Settings\Pages\ListSettings;
use Bites\Core\Resources\Settings\Schemas\SettingForm;
use Bites\Core\Resources\Settings\Tables\SettingsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static string|BackedEnum|null $navigationIcon = 'myicon-c-setting';

    protected static string|UnitEnum|null $navigationGroup = 'Configuration';

    protected static ?string $modelLabel = 'Settings';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return SettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SettingsTable::configure($table);
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
            'index' => ListSettings::route('/'),
            'create' => CreateSetting::route('/create'),
            'edit' => EditSetting::route('/{record}/edit'),
        ];
    }
}
