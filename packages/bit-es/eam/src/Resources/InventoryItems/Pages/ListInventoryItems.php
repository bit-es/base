<?php

namespace Bites\Eam\Resources\InventoryItems\Pages;

use Bites\Eam\Resources\InventoryItems\InventoryItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInventoryItems extends ListRecords
{
    protected static string $resource = InventoryItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
