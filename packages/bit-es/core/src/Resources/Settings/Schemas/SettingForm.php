<?php

namespace Bites\Core\Resources\Settings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;  
use Bites\Core\Enums\SettingType;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            Forms\Components\TextInput::make('key')->required(),
            Forms\Components\Select::make('type')
                ->options(SettingType::options())
                ->required(),
            Forms\Components\Select::make('classify_id')
                ->relationship('classify', 'name')
                ->nullable(),
            Forms\Components\Textarea::make('value')
                ->json()
                ->rows(10),
        ]);


    }
}
