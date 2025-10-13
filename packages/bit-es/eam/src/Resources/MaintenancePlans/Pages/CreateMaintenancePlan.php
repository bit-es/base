<?php

namespace Bites\Eam\Resources\MaintenancePlans\Pages;

use Bites\Eam\Resources\MaintenancePlans\MaintenancePlanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMaintenancePlan extends CreateRecord
{
    protected static string $resource = MaintenancePlanResource::class;
}
