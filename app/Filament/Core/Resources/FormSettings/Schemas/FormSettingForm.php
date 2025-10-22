<?php

namespace App\Filament\Core\Resources\FormSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FormSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                Repeater::make('schema')
                    ->label('Form Fields')
                    ->schema([
                        Select::make('type')
                            ->options([
                                'text' => 'Text',
                                'select' => 'Select',
                                'date' => 'Date',
                                'email' => 'Email',
                                'number' => 'Number',
                            ])
                            ->required(),

                        TextInput::make('name')->required(),
                        TextInput::make('label')->required(),
                        Toggle::make('required'),

                        KeyValue::make('rules')
                            ->label('Validation Rules')
                            ->keyLabel('Rule')
                            ->valueLabel('Value')
                            ->addActionLabel('Add Rule'),

                        KeyValue::make('options')
                            ->label('Options (for select)')
                            ->visible(fn($get) => $get('type') === 'select'),
                    ])
                    ->columns(2)
                    ->reorderable()
                    ->collapsible()
                    ->default([]),
            ]);
    }
}
