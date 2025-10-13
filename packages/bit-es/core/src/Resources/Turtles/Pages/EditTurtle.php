<?php

namespace Bites\Core\Resources\Turtles\Pages;

use Bites\Core\Resources\Turtles\TurtleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTurtle extends EditRecord
{
    protected static string $resource = TurtleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
