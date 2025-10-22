<?php

namespace Bites\Eam\Resources\JobPlans;

use BackedEnum;
use Bites\Eam\Models\JobPlan;
use Bites\Eam\Resources\JobPlans\Pages\CreateJobPlan;
use Bites\Eam\Resources\JobPlans\Pages\EditJobPlan;
use Bites\Eam\Resources\JobPlans\Pages\ListJobPlans;
use Bites\Eam\Resources\JobPlans\Schemas\JobPlanForm;
use Bites\Eam\Resources\JobPlans\Tables\JobPlansTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class JobPlanResource extends Resource
{
    protected static ?string $model = JobPlan::class;

    protected static string|BackedEnum|null $navigationIcon = 'myicon-c-job-plan';

    protected static string|UnitEnum|null $navigationGroup = 'Maintenance';

    protected static ?string $modelLabel = 'Job Plans';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'jpnum';

    public static function form(Schema $schema): Schema
    {
        return JobPlanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JobPlansTable::configure($table);
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
            'index' => ListJobPlans::route('/'),
            'create' => CreateJobPlan::route('/create'),
            'edit' => EditJobPlan::route('/{record}/edit'),
        ];
    }
}
