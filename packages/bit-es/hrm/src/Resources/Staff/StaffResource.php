<?php

namespace Bites\Hrm\Resources\Staff;

use BackedEnum;
use Bites\Hrm\Models\Staff;
use Bites\Hrm\Resources\Staff\Pages\CreateStaff;
use Bites\Hrm\Resources\Staff\Pages\EditStaff;
use Bites\Hrm\Resources\Staff\Pages\ListStaff;
use Bites\Hrm\Resources\Staff\Schemas\StaffForm;
use Bites\Hrm\Resources\Staff\Tables\StaffTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    protected static string|UnitEnum|null $navigationGroup = 'Records';

    protected static ?string $modelLabel = 'Staff';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return StaffForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StaffTable::configure($table);
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
            'index' => ListStaff::route('/'),
            'create' => CreateStaff::route('/create'),
            'edit' => EditStaff::route('/{record}/edit'),
        ];
    }
}
