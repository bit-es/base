<?php

namespace Bites\Core\Resources\Settings\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Illuminate\Support\Str;

class RelationsForm
{
    public static function build(array $config): array
    {
        $components = [];

        foreach ($config as $field) {
            $components[] = self::mapField($field);
        }

        return array_filter($components);
    }

    protected static function mapField(array $field): ?Component
    {
        $type = $field['input_type'] ?? 'TextInput';
        $label = $field['description'] ?? 'Field';
        $name = $field['name'] ?? Str::slug($label, '_');

        return match ($type) {
            'TextInput' => TextInput::make($name)->label($label),
            'Textarea' => Textarea::make($name)->label($label),
            'Select' => Select::make($name)
                ->label($label)
                ->options(array_combine($field['input_option'], $field['input_option'])),
            'ToggleButtons' => ToggleButtons::make($name)
                ->label($label)
                ->options(array_combine($field['input_option'], $field['input_option'])),
            'Checkbox' => Checkbox::make($name)->label($label),
            'DatePicker' => DatePicker::make($name)->label($label),
            default => null,
        };
    }
}
