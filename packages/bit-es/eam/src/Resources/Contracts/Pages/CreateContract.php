<?php

namespace Bites\Eam\Resources\Contracts\Pages;

use Bites\Eam\Resources\Contracts\ContractResource;
use Filament\Resources\Pages\CreateRecord;

class CreateContract extends CreateRecord
{
    protected static string $resource = ContractResource::class;
}
