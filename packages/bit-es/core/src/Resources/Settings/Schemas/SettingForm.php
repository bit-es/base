<?php

namespace Bites\Core\Resources\Settings\Schemas;

use Bites\Core\Enums\SettingType;
use Bites\Core\Models\Csa\Classify;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\CodeEditor\Enums\Language;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            ToggleButtons::make('applies_to')
                ->label('Applies To')
                ->grouped()
                ->options(SettingType::options())
                ->enum(SettingType::class)
                ->required()
                ->reactive()
                ->afterStateUpdated(fn ($state, callable $set) => $set('form_builder', [])),

            Select::make('classify_id')
                ->options(fn () => Classify::treeOptions())
                ->relationship('classify', 'id')
                ->searchable()
                ->preload()
                ->required(),

            Textarea::make('meta')
                ->label('Meta (JSON)')
                ->json()
                ->nullable()
                ->rows(4),

            Fieldset::make('Input Fields')
                ->schema(function ($get) {
                    $type = $get('applies_to');

                    return match ($type) {
                        SettingType::Property => self::getPropertyFormSchema(),
                        SettingType::Metric => self::getMetricFormSchema(),
                        SettingType::Task => self::getTaskFormSchema(),
                        SettingType::Event => self::getEventFormSchema(),
                        SettingType::Snapshot => self::getSnapshotFormSchema(),
                        default => [],
                    };
                })
                ->columns(1),

            Hidden::make('form_builder')
                ->afterStateHydrated(function ($state, $set) {
                    if (is_string($state)) {
                        $state = json_decode($state, true);
                    }
                    if (is_array($state)) {
                        foreach ($state as $key => $value) {
                            $set($key, $value);
                        }
                    }
                }),

            CodeEditor::make('form_schema')
                ->language(Language::Json)
                ->label('Form Schema (JSON)')
                ->afterStateHydrated(function ($state, $set) {
                    if (is_array($state)) {
                        $set('form_builder', $state);
                    }
                })
                ->dehydrateStateUsing(fn ($get) => json_encode($get('form_builder'), JSON_PRETTY_PRINT)),
        ]);
    }

    protected static function getPropertyFormSchema(): array
    {
        return [
            TextInput::make('name')->label('Field Name')->required(),
            TextInput::make('label')->label('Label')->required(),
            Select::make('type')
                ->label('Field Type')
                ->options([
                    'TextInput' => 'Text Input',
                    'Textarea' => 'Textarea',
                    'Select' => 'Select',
                    'ToggleButtons' => 'Toggle Buttons',
                    'DatePicker' => 'Date Picker',
                    'FileUpload' => 'File Upload',
                ])
                ->reactive()
                ->required(),
            TextInput::make('rules')->label('Validation Rules (optional)')->placeholder('e.g. required|min:3'),
            Repeater::make('options')
                ->label('Options')
                ->schema([
                    TextInput::make('option')->label('Option Value'),
                ])
                ->collapsed()
                ->visible(fn ($get) => in_array($get('type'), ['Select', 'ToggleButtons'])),
            Toggle::make('required')->label('Required')->default(false),
        ];
    }

    protected static function getMetricFormSchema(): array
    {
        return [
            TextInput::make('key')->required(),
            TextInput::make('value')->required(),
            TextInput::make('unit_of_measure'),
            DatePicker::make('date')->required(),
        ];
    }

    protected static function getTaskFormSchema(): array
    {
        return [
            TextInput::make('title')->required(),
            Textarea::make('description'),
            DatePicker::make('due_at'),
            Select::make('status')->options([
                'pending' => 'Pending',
                'completed' => 'Completed',
                'cancelled' => 'Cancelled',
            ]),
        ];
    }

    protected static function getEventFormSchema(): array
    {
        return [
            TextInput::make('title')->required(),
            Textarea::make('description'),
            DateTimePicker::make('start_at'),
            DateTimePicker::make('end_at'),
        ];
    }

    protected static function getSnapshotFormSchema(): array
    {
        return [
            TextInput::make('title')->required(),
            FileUpload::make('image_url')->image(),
            TextInput::make('location'),
            DateTimePicker::make('taken_at'),
            TextInput::make('tag'),
        ];
    }
}
