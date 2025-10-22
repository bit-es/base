<?php

namespace Bites\Eam\Resources\JobPlans\Pages;

use Bites\Eam\Resources\JobPlans\JobPlanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJobPlan extends CreateRecord
{
    protected static string $resource = JobPlanResource::class;
}
