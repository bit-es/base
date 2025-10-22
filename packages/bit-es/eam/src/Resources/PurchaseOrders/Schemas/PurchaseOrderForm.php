<?php

namespace Bites\Eam\Resources\PurchaseOrders\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PurchaseOrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('ponum')
                    ->required(),
                TextInput::make('company_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('order_date')
                    ->required(),
                TextInput::make('total_cost')
                    ->numeric(),
            ]);
    }
}
