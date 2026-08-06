<?php

namespace Bites\Hrm\Resources\WorkforceTemplates;

use BackedEnum;
use Bites\Hrm\Models\WorkforceTemplate;
use Bites\Hrm\Resources\WorkforceTemplates\Pages\CreateWorkforceTemplate;
use Bites\Hrm\Resources\WorkforceTemplates\Pages\EditWorkforceTemplate;
use Bites\Hrm\Resources\WorkforceTemplates\Pages\ListWorkforceTemplates;
use Bites\Hrm\Resources\WorkforceTemplates\Pages\ViewWorkforceTemplate;
use Bites\Hrm\Resources\WorkforceTemplates\Schemas\WorkforceTemplateForm;
use Bites\Hrm\Resources\WorkforceTemplates\Schemas\WorkforceTemplateInfolist;
use Bites\Hrm\Resources\WorkforceTemplates\Tables\WorkforceTemplatesTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WorkforceTemplateResource extends Resource
{
    protected static ?string $model = WorkforceTemplate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return WorkforceTemplateForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WorkforceTemplateInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WorkforceTemplatesTable::configure($table);
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
            'index' => ListWorkforceTemplates::route('/'),
            'create' => CreateWorkforceTemplate::route('/create'),
            'view' => ViewWorkforceTemplate::route('/{record}'),
            'edit' => EditWorkforceTemplate::route('/{record}/edit'),
        ];
    }
}
