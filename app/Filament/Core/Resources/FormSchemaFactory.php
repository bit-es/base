<?php

namespace App\Services;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RadioGroup;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;

class FormSchemaFactory
{
    public static function fromJson(array $schema): array
    {
        $components = [];

        foreach ($schema['fields'] ?? [] as $field) {
            $label = $field['label'] ?? ucfirst($field['key']);
            $required = $field['required'] ?? false;

            switch ($field['type']) {
                case 'TextInput':
                    $input = TextInput::make($field['key'])
                        ->label($label)
                        ->required($required);

                    if (isset($field['placeholder'])) {
                        $input->placeholder($field['placeholder']);
                    }

                    if (isset($field['input_type'])) {
                        $input->type($field['input_type']);
                    }

                    $components[] = $input;
                    break;

                case 'Textarea':
                    $components[] = Textarea::make($field['key'])
                        ->label($label)
                        ->placeholder($field['placeholder'] ?? '')
                        ->required($required);
                    break;

                case 'Select':
                    $components[] = Select::make($field['key'])
                        ->label($label)
                        ->options($field['options'] ?? [])
                        ->required($required);
                    break;

                case 'RadioGroup':
                    $components[] = RadioGroup::make($field['key'])
                        ->label($label)
                        ->options($field['options'] ?? [])
                        ->required($required);
                    break;

                case 'CheckboxList':
                    $components[] = CheckboxList::make($field['key'])
                        ->label($label)
                        ->options($field['options'] ?? [])
                        ->required($required);
                    break;

                case 'Toggle':
                    $components[] = Toggle::make($field['key'])
                        ->label($label)
                        ->required($required);
                    break;

                case 'DatePicker':
                    $components[] = DatePicker::make($field['key'])
                        ->label($label)
                        ->required($required);
                    break;

                case 'TimePicker':
                    $components[] = TimePicker::make($field['key'])
                        ->label($label)
                        ->required($required);
                    break;

                case 'DateTimePicker':
                    $components[] = DateTimePicker::make($field['key'])
                        ->label($label)
                        ->required($required);
                    break;

                case 'FileUpload':
                    $components[] = FileUpload::make($field['key'])
                        ->label($label)
                        ->required($required);
                    break;

                case 'TagsInput':
                    $components[] = TagsInput::make($field['key'])
                        ->label($label)
                        ->required($required);
                    break;

                    // Add more cases as needed
            }
        }

        return $components;
    }
}
