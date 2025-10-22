<?php

namespace Bites\Eam\Resources\WorkOrders\Pages;

use Bites\Eam\Resources\WorkOrders\WorkOrderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWorkOrders extends ListRecords
{
    protected static string $resource = WorkOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
