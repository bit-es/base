<?php

namespace App\Filament\Core\Resources\FormSettings;

use App\Filament\Core\Resources\FormSettings\Pages\CreateFormSetting;
use App\Filament\Core\Resources\FormSettings\Pages\EditFormSetting;
use App\Filament\Core\Resources\FormSettings\Pages\ListFormSettings;
use App\Filament\Core\Resources\FormSettings\Schemas\FormSettingForm;
use App\Filament\Core\Resources\FormSettings\Tables\FormSettingsTable;
use App\Models\FormSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FormSettingResource extends Resource
{
    protected static ?string $model = FormSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return FormSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormSettingsTable::configure($table);
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
            'index' => ListFormSettings::route('/'),
            'create' => CreateFormSetting::route('/create'),
            'edit' => EditFormSetting::route('/{record}/edit'),
        ];
    }
}
