<?php

namespace Bites\Eam\Resources\MaintenanceRecords\Pages;

use Bites\Eam\Resources\MaintenanceRecords\MaintenanceRecordResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMaintenanceRecords extends ListRecords
{
    protected static string $resource = MaintenanceRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
