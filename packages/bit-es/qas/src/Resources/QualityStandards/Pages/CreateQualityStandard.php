<?php

namespace Bites\Qas\Resources\QualityStandards\Pages;

use Bites\Qas\Resources\QualityStandards\QualityStandardResource;
use Filament\Resources\Pages\CreateRecord;

class CreateQualityStandard extends CreateRecord
{
    protected static string $resource = QualityStandardResource::class;
}
