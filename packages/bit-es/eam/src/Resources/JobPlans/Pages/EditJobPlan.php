<?php

namespace Bites\Eam\Resources\JobPlans\Pages;

use Bites\Eam\Resources\JobPlans\JobPlanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditJobPlan extends EditRecord
{
    protected static string $resource = JobPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
