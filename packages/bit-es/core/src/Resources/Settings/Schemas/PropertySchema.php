<?php

namespace Bites\Core\Resources\Settings\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class PropertySchema
{
    public static function configure(): array
    {
        return [
            Repeater::make('form_builder')
                ->label('Property Fields')
                ->schema([
                    TextInput::make('name')
                        ->label('Field Name')
                        ->required()
                        ->helperText('This will be used as the key in the database.'),

                    TextInput::make('label')
                        ->label('Label')
                        ->required()
                        ->helperText('Human-readable label for the field.'),

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
                        ->label('Validation Rules')
                        ->placeholder('e.g. required|min:3')
                        ->helperText('Laravel validation rules, comma-separated.'),

                    Repeater::make('options')
                        ->label('Options')
                        ->schema([
                            TextInput::make('option')
                                ->label('Option Value'),
                        ])
                        ->collapsed()
                        ->visible(fn ($get) => in_array($get('../../type'), ['Select', 'ToggleButtons'])),

                    Toggle::make('required')
                        ->label('Required')
                        ->default(false),
                ])
                ->addActionLabel('Add Property Field')
                ->columns(1),
        ];
    }
}
