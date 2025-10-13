<?php

namespace Bites\Mes\Resources\WorkCenters\Pages;

use Bites\Mes\Resources\WorkCenters\WorkCenterResource;
use Filament\Resources\Pages\CreateRecord;

class CreateWorkCenter extends CreateRecord
{
    protected static string $resource = WorkCenterResource::class;
}
