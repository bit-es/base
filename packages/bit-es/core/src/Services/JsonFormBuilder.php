<?php

namespace Bites\Core\Services;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\EmailInput;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Forms\Components\NumberInput;

class JsonFormBuilder
{
    public static function fromSchema(array $schema): array
    {
        return collect($schema)->map(function ($field) {
            $component = match ($field['type']) {
                'text' => TextInput::make($field['name']),
                // 'email' => EmailInput::make($field['name']),
                // 'number' => NumberInput::make($field['name']),
                'textarea' => Textarea::make($field['name']),
                'select' => Select::make($field['name'])->options($field['options'] ?? []),
                'date' => DatePicker::make($field['name']),
                'toggle' => Toggle::make($field['name']),
                default => null,
            };

            if (! $component) {
                return null;
            }

            // Apply label
            if (isset($field['label'])) {
                $component->label($field['label']);
            }

            // Apply required
            if (!empty($field['required'])) {
                $component->required();
            }

            // Apply rules
            if (!empty($field['rules']) && is_array($field['rules'])) {
                $component->rules(array_values($field['rules']));
            }

            return $component;
        })->filter()->values()->toArray();
    }
}