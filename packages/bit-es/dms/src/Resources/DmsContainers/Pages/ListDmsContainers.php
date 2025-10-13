<?php

namespace Bites\Dms\Resources\DmsContainers\Pages;

use Bites\Dms\Resources\DmsContainers\DmsContainerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDmsContainers extends ListRecords
{
    protected static string $resource = DmsContainerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
