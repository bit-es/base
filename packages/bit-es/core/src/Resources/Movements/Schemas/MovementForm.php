<?php

namespace Bites\Core\Resources\Movements\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MovementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('movable_type')
                    ->required(),
                TextInput::make('movable_id')
                    ->required()
                    ->numeric(),
                TextInput::make('from_location_id')
                    ->numeric(),
                TextInput::make('to_location_id')
                    ->numeric(),
                DateTimePicker::make('moved_at'),
            ]);
    }
}
