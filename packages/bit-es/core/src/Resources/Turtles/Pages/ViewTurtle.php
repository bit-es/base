<?php

namespace Bites\Core\Resources\Turtles\Pages;

use Bites\Core\Resources\Turtles\TurtleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTurtle extends ViewRecord
{
    protected static string $resource = TurtleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
