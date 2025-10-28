<?php

namespace Bites\Core\Resources\Locations\Schemas;

use Bites\Core\Field\CameraCapture;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                CameraCapture::make('snapshot_path')->label('Capture Image'),
                TextInput::make('code')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('type')
                    ->required(),
                TextInput::make('parent_id')
                    ->numeric(),
            ]);
    }
}
