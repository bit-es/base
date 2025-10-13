<?php

namespace Bites\Eam\Resources\SpareParts\Pages;

use Bites\Eam\Resources\SpareParts\SparePartResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSpareParts extends ListRecords
{
    protected static string $resource = SparePartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
