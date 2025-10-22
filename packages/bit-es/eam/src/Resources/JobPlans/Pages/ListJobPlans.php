<?php

namespace Bites\Eam\Resources\JobPlans\Pages;

use Bites\Eam\Resources\JobPlans\JobPlanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJobPlans extends ListRecords
{
    protected static string $resource = JobPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
