<?php

namespace Bites\Dms\Resources\DmsFiles\Pages;

use Bites\Dms\Resources\DmsFiles\DmsFileResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDmsFile extends CreateRecord
{
    protected static string $resource = DmsFileResource::class;
}
