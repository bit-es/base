<?php

namespace Bites\Eam\Resources\WorkOrders\Pages;

use Bites\Eam\Resources\WorkOrders\WorkOrderResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewWorkOrder extends ViewRecord
{
    protected static string $resource = WorkOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
