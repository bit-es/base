<?php

namespace Bites\Qas\Resources\Methodologies\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MethodologyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('methodology')
                    ->required(),
                TextInput::make('purpose'),
                Textarea::make('brief_explanation')
                    ->columnSpanFull(),
                Toggle::make('needs_form')
                    ->required(),
                Toggle::make('needs_report')
                    ->required(),
                TextInput::make('typical_record_type'),
                TextInput::make('example_template_name'),
                TextInput::make('external_url')
                    ->url(),
            ]);
    }
}
