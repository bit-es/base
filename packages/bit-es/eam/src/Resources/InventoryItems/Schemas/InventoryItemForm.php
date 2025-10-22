<?php

namespace Bites\Eam\Resources\InventoryItems\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InventoryItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('itemnum')
                    ->required(),
                TextInput::make('description')
                    ->required(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('reorder_point')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('location'),
                TextInput::make('company_id')
                    ->numeric(),
            ]);
    }
}
