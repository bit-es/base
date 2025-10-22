<?php

namespace Bites\Eam\Resources\Assets\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('asset_tag')
                    ->required(),
                TextInput::make('name'),
                TextInput::make('description')
                    ->required(),
                TextInput::make('home_location_id')
                    ->numeric(),
                TextInput::make('serialnum'),
                TextInput::make('modelnum'),
                Select::make('asset_type_id')
                    ->relationship('assetType', 'name'),
                TextInput::make('parent_id')
                    ->numeric(),
                DatePicker::make('commissioned_at'),
                DatePicker::make('disposed_at'),
                TextInput::make('status')
                    ->required(),
            ]);
    }
}
