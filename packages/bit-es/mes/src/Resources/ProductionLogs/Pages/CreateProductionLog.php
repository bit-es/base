<?php

namespace Bites\Mes\Resources\ProductionLogs\Pages;

use Bites\Mes\Resources\ProductionLogs\ProductionLogResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductionLog extends CreateRecord
{
    protected static string $resource = ProductionLogResource::class;
}
