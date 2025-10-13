<?php

namespace App\Core\Relations;

use App\Services\FormSchemaFactory;
use Bites\Core\Models\Setting;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class TaskRelations extends RelationManager
{
    protected static string $relationship = 'tasks';

    public static function getTabComponent(Model $ownerRecord, string $pageClass): Tab
    {
        return Tab::make('Tasks')->icon('heroicon-m-check-circle');
    }

    public function form(Schema $schema): Schema
    {
        $json = json_decode(Setting::where('key', 'task_schema')->value('value'), true);

        return $schema->components(FormSchemaFactory::fromJson($json));
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('status'),
                TextColumn::make('due_date')->dateTime(),
            ])
            ->headerActions([
                CreateAction::make()->label('Add Task')->modalWidth('6xl'),
            ]);
    }
}
