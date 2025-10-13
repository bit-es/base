<?php

namespace Bites\Core\Resources\JobPositions\Pages;

use Bites\Core\Resources\JobPositions\JobPositionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJobPosition extends CreateRecord
{
    protected static string $resource = JobPositionResource::class;
}
