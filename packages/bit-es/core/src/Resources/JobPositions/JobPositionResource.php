<?php

namespace Bites\Core\Resources\JobPositions;

use BackedEnum;
use Bites\Core\Models\JobPosition;
use Bites\Core\Resources\JobPositions\Pages\CreateJobPosition;
use Bites\Core\Resources\JobPositions\Pages\EditJobPosition;
use Bites\Core\Resources\JobPositions\Pages\ListJobPositions;
use Bites\Core\Resources\JobPositions\Schemas\JobPositionForm;
use Bites\Core\Resources\JobPositions\Tables\JobPositionsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class JobPositionResource extends Resource
{
    protected static ?string $model = JobPosition::class;

    protected static string|BackedEnum|null $navigationIcon = 'myicon-c-chair';

    protected static string|UnitEnum|null $navigationGroup = 'Organization Structure';

    protected static ?string $modelLabel = 'Job Positions';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return JobPositionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JobPositionsTable::configure($table);
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
            'index' => ListJobPositions::route('/'),
            'create' => CreateJobPosition::route('/create'),
            'edit' => EditJobPosition::route('/{record}/edit'),
        ];
    }
}
