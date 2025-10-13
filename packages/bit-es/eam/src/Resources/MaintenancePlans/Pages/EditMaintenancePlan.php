<?php

namespace Bites\Eam\Resources\MaintenancePlans\Pages;

use Bites\Eam\Resources\MaintenancePlans\MaintenancePlanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMaintenancePlan extends EditRecord
{
    protected static string $resource = MaintenancePlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
