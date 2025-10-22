<?php

namespace Bites\Eam\Resources\Assets\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AssetInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('asset_tag'),
                TextEntry::make('name')
                    ->placeholder('-'),
                TextEntry::make('description'),
                TextEntry::make('home_location_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('serialnum')
                    ->placeholder('-'),
                TextEntry::make('modelnum')
                    ->placeholder('-'),
                TextEntry::make('assetType.name')
                    ->label('Asset type')
                    ->placeholder('-'),
                TextEntry::make('parent_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('commissioned_at')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('disposed_at')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
