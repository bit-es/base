<?php

namespace Bites\Core\Resources\Settings\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MetricSchema
{
    public static function configure(Schema $schema): Schema
    {
        dump($schema);

        return $schema
            ->components([
                Repeater::make('fields')
                    ->label('Metric Fields')
                    ->schema([
                        TextInput::make('name')
                            ->label('Field Name')
                            ->required(),

                        TextInput::make('label')
                            ->label('Label')
                            ->required(),

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

                        TextInput::make('rules')
                            ->label('Validation Rules (optional)')
                            ->placeholder('e.g. required|min:3'),

                        Repeater::make('options')
                            ->label('Options')
                            ->schema([
                                TextInput::make('option')
                                    ->label('Option Value'),
                            ])
                            ->collapsed()
                            ->visible(fn ($get) => in_array($get('type'), ['Select', 'ToggleButtons'])),

                        Toggle::make('required')
                            ->label('Required')
                            ->default(false),
                    ])
                    ->columns(1)
                    ->addActionLabel('Add Field'),
            ]);
    }
}
