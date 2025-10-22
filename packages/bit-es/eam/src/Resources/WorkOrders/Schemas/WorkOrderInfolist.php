<?php

namespace Bites\Eam\Resources\WorkOrders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class WorkOrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('wonum'),
                TextEntry::make('asset.name')
                    ->label('Asset')
                    ->placeholder('-'),
                TextEntry::make('location.name')
                    ->label('Location')
                    ->placeholder('-'),
                TextEntry::make('description'),
                TextEntry::make('status'),
                TextEntry::make('worktype'),
                TextEntry::make('schedstart')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('actualstart')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('actualfinish')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
