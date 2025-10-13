<?php

namespace Bites\Core\Resources\Turtles\Pages;

use Bites\Core\Resources\Turtles\TurtleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTurtles extends ListRecords
{
    protected static string $resource = TurtleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
