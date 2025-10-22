<?php

namespace Bites\Eam\Resources\WorkOrders\Pages;

use Bites\Eam\Resources\WorkOrders\WorkOrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateWorkOrder extends CreateRecord
{
    protected static string $resource = WorkOrderResource::class;
}
