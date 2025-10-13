<?php

namespace Bites\Mes\Resources\ProductionOrders\Pages;

use Bites\Mes\Resources\ProductionOrders\ProductionOrderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProductionOrders extends ListRecords
{
    protected static string $resource = ProductionOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
