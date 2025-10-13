<?php

namespace Bites\Mes\Resources\WorkCenters\Pages;

use Bites\Mes\Resources\WorkCenters\WorkCenterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWorkCenters extends ListRecords
{
    protected static string $resource = WorkCenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
