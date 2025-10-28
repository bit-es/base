<?php

namespace Bites\Core\Resources\Movements\Pages;

use Bites\Core\Resources\Movements\MovementResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMovement extends CreateRecord
{
    protected static string $resource = MovementResource::class;
}
