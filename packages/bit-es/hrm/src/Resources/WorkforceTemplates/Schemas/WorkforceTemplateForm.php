<?php

namespace Bites\Hrm\Resources\WorkforceTemplates\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WorkforceTemplateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('attributes')
                    ->columnSpanFull(),
                TextInput::make('masco_code'),
            ]);
    }
}
