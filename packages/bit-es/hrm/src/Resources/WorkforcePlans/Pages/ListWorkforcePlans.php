<?php

namespace Bites\Hrm\Resources\WorkforcePlans\Pages;

use Bites\Hrm\Resources\WorkforcePlans\WorkforcePlanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWorkforcePlans extends ListRecords
{
    protected static string $resource = WorkforcePlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
