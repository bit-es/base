<?php

namespace Bites\Core\Relations;

use Bites\Core\Services\JsonFormBuilder;
use App\Models\FormSetting;
use Bites\Core\Models\Setting;

use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table; // adjust namespace if needed
use Illuminate\Database\Eloquent\Model;

class MetricRelations extends RelationManager
{
    protected static string $relationship = 'metrics';

    // protected $jsondata = Setting::where('key', 'metric_schema')->value('value');

    public static function getTabComponent(Model $ownerRecord, string $pageClass): Tab
    {
        return Tab::make('Metrics')
            ->icon('heroicon-m-document-chart-bar')
            ->schema(static::getFormSchema());
    }

    public static function getFormSchema(): array
    {
        $formSetting = FormSetting::find(1);
        // $formSetting = FormSetting::where('name', 'metric_schema')->first();
        $schema = $formSetting?->schema ?? [];
        return JsonFormBuilder::fromSchema($schema);
    }


    public function form(Schema $schema): Schema
    {
        return $schema->components(static::getFormSchema());
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
