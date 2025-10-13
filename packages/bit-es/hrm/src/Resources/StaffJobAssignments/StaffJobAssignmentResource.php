<?php

namespace Bites\Hrm\Resources\StaffJobAssignments;

use BackedEnum;
use Bites\Hrm\Models\StaffJobAssignment;
use Bites\Hrm\Resources\StaffJobAssignments\Pages\CreateStaffJobAssignment;
use Bites\Hrm\Resources\StaffJobAssignments\Pages\EditStaffJobAssignment;
use Bites\Hrm\Resources\StaffJobAssignments\Pages\ListStaffJobAssignments;
use Bites\Hrm\Resources\StaffJobAssignments\Schemas\StaffJobAssignmentForm;
use Bites\Hrm\Resources\StaffJobAssignments\Tables\StaffJobAssignmentsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class StaffJobAssignmentResource extends Resource
{
    protected static ?string $model = StaffJobAssignment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCursorArrowRipple;

    protected static string|UnitEnum|null $navigationGroup = 'Records';

    protected static ?string $modelLabel = 'Job Assignments';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return StaffJobAssignmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StaffJobAssignmentsTable::configure($table);
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
            'index' => ListStaffJobAssignments::route('/'),
            'create' => CreateStaffJobAssignment::route('/create'),
            'edit' => EditStaffJobAssignment::route('/{record}/edit'),
        ];
    }
}
