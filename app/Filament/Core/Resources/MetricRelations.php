<?php

namespace App\Core\Relations;

use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use App\Services\FormSchemaFactory;
use Bites\Core\Models\Setting;

class MetricRelations extends RelationManager
{
    protected static string $relationship = 'metrics';

    public static function getTabComponent(Model $ownerRecord, string $pageClass): Tab
    {
        return Tab::make('Metrics')->icon('heroicon-m-home');
    }

    public function form(Schema $schema): Schema
    {
        $json = json_decode(Setting::where('key', 'metric_schema')->value('value'), true);
        return $schema->components(FormSchemaFactory::fromJson($json));
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('value'),
                TextColumn::make('updated_at')->dateTime(),
            ])
            ->headerActions([
                CreateAction::make()->label('Add Metric')->modalWidth('6xl'),
            ]);
    }
}