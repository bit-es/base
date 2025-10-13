<?php

namespace Bites\Qas\Resources\NonConformities\Pages;

use Bites\Qas\Resources\NonConformities\NonConformityResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNonConformity extends CreateRecord
{
    protected static string $resource = NonConformityResource::class;
}
