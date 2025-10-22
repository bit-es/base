<?php

namespace Bites\Eam\Resources\AssetTypes\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AssetTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('code')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
