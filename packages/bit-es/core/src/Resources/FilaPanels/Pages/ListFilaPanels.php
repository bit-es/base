<?php

namespace Bites\Core\Resources\FilaPanels\Pages;

use Bites\Core\Resources\FilaPanels\FilaPanelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFilaPanels extends ListRecords
{
    protected static string $resource = FilaPanelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
