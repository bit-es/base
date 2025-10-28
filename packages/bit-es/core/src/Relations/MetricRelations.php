<?php

namespace Bites\Core\Relations;

use App\Models\FormSetting;
use Bites\Core\Models\Csa\Setting;
use Bites\Core\Services\JsonFormBuilder;
use Filament\Actions\CreateAction;
use Filament\Forms\Components;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
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
        // return $schema->components(static::getFormSchema());

        return $schema(function (callable $get) {
            $setting = Setting::where('classify_id', $get('classify_id'))
                ->where('applies_to', 'Metric') // change per type
                ->first();

            // if (! $setting || empty($setting->form_schema['fields'])) {
            //     return [ Component\TextEntry::make('no_schema')->label('No schema found') ];
            // }

            $fields = [];
            foreach ($setting->form_schema['fields'] as $field) {
                $component = match ($field['type']) {
                    'TextInput' => Components\TextInput::make($field['name']),
                    'Textarea' => Components\Textarea::make($field['name']),
                    'Select' => Components\Select::make($field['name'])
                        ->options(array_combine($field['options'], $field['options'])),
                    'ToggleButtons' => Components\ToggleButtons::make($field['name'])
                        ->options(array_combine($field['options'], $field['options'])),
                    'DatePicker' => Components\DatePicker::make($field['name']),
                    'FileUpload' => Components\FileUpload::make($field['name']),
                    default => Components\TextInput::make($field['name']),
                };

                $component->label($field['label'] ?? ucfirst($field['name']));
                if (! empty($field['rules'])) {
                    $component->rules($field['rules']);
                }
                $fields[] = $component;
            }

            return $fields;
        });

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
