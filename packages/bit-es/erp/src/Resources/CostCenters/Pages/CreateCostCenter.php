<?php

namespace Bites\Erp\Resources\CostCenters\Pages;

use Bites\Erp\Resources\CostCenters\CostCenterResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCostCenter extends CreateRecord
{
    protected static string $resource = CostCenterResource::class;
}
