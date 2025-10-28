<?php

namespace Bites\Eam\Resources\Assets\Schemas;

use Bites\Core\Field\CameraUpload;
use Bites\Core\Field\ScanCode;
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

                ScanCode::make('name'),
                TextInput::make('description')
                    ->required(),
                TextInput::make('home_location_id')
                    ->numeric(),
                CameraUpload::make('serialnum'),
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
