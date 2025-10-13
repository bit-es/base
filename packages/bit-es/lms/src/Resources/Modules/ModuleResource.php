<?php

namespace Bites\Lms\Resources\Modules;

use BackedEnum;
use Bites\Lms\Models\Module;
use Bites\Lms\Resources\Modules\Pages\CreateModule;
use Bites\Lms\Resources\Modules\Pages\EditModule;
use Bites\Lms\Resources\Modules\Pages\ListModules;
use Bites\Lms\Resources\Modules\Schemas\ModuleForm;
use Bites\Lms\Resources\Modules\Tables\ModulesTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ModuleResource extends Resource
{
    protected static ?string $model = Module::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBookOpen;

    protected static string|UnitEnum|null $navigationGroup = 'Academy';

    protected static ?string $modelLabel = 'Modules';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ModuleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ModulesTable::configure($table);
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
            'index' => ListModules::route('/'),
            'create' => CreateModule::route('/create'),
            'edit' => EditModule::route('/{record}/edit'),
        ];
    }
}
