<?php

namespace Bites\Eam\Resources\InventoryItems\Pages;

use Bites\Eam\Resources\InventoryItems\InventoryItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInventoryItem extends CreateRecord
{
    protected static string $resource = InventoryItemResource::class;
}
