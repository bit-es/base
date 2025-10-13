<?php

namespace Bites\Mes\Resources\ProductionOrders\Pages;

use Bites\Mes\Resources\ProductionOrders\ProductionOrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductionOrder extends CreateRecord
{
    protected static string $resource = ProductionOrderResource::class;
}
