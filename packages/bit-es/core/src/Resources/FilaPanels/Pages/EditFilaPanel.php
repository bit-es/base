<?php

namespace Bites\Core\Resources\FilaPanels\Pages;

use Bites\Core\Resources\FilaPanels\FilaPanelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFilaPanel extends EditRecord
{
    protected static string $resource = FilaPanelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
