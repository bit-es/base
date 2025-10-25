<?php

namespace Bites\Core\Resources\Workflows;

use Bites\Core\Resources\Workflows\Pages\CreateWorkflow;
use Bites\Core\Resources\Workflows\Pages\EditWorkflow;
use Bites\Core\Resources\Workflows\Pages\ListWorkflows;
use Bites\Core\Resources\Workflows\Schemas\WorkflowForm;
use Bites\Core\Resources\Workflows\Tables\WorkflowsTable;
use Bites\Core\Models\Workflow;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WorkflowResource extends Resource
{
    protected static ?string $model = Workflow::class;

    protected static string|BackedEnum|null $navigationIcon = 'myicon-c-workflow';

    protected static string|UnitEnum|null $navigationGroup = 'Process Framework';

    protected static ?string $modelLabel = 'Workflows';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return WorkflowForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WorkflowsTable::configure($table);
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
            'index' => ListWorkflows::route('/'),
            'create' => CreateWorkflow::route('/create'),
            'edit' => EditWorkflow::route('/{record}/edit'),
        ];
    }
}
