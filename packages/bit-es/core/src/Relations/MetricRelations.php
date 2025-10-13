<?php

namespace Bites\Core\Relations;

use App\Services\FormSchemaFactory;
use Bites\Core\Models\Setting;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table; // adjust namespace if needed
use Illuminate\Database\Eloquent\Model;

class MetricRelations extends RelationManager
{
    protected static string $relationship = 'metrics';

    protected $jsondata = Setting::where('key', 'metric_schema')->value('value');

    public static function getTabComponent(Model $ownerRecord, string $pageClass): Tab
    {
        return Tab::make('Metrics')
            ->icon('heroicon-m-document-chart-bar');
    }

    public function form(Schema $schema): Schema
    {

        $json = json_decode($this->jsondata);

        return $schema->components([(FormSchemaFactory::fromJson($json))]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key'),
                TextColumn::make('value'),
                TextColumn::make('recorded_at')->dateTime(),
                TextColumn::make('setting.name')->label('Setting'),
            ])
            ->headerActions([
                CreateAction::make()->label('Add')->modalWidth('6xl'),
            ]);
    }
}
