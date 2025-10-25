<?php

namespace Bites\Core\Resources\Workflows\Pages;

use Bites\Core\Resources\Workflows\WorkflowResource;
use Filament\Resources\Pages\CreateRecord;

class CreateWorkflow extends CreateRecord
{
    protected static string $resource = WorkflowResource::class;
}
