<?php

namespace Bites\Eam\Resources\WorkOrders\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WorkOrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('wonum')
                    ->required(),
                Select::make('asset_id')
                    ->relationship('asset', 'name'),
                Select::make('location_id')
                    ->relationship('location', 'name'),
                TextInput::make('description')
                    ->required(),
                TextInput::make('status')
                    ->required(),
                TextInput::make('worktype')
                    ->required(),
                DatePicker::make('schedstart'),
                DatePicker::make('actualstart'),
                DatePicker::make('actualfinish'),
            ]);
    }
}
