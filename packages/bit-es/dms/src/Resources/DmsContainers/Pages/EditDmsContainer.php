<?php

namespace Bites\Dms\Resources\DmsContainers\Pages;

use Bites\Dms\Resources\DmsContainers\DmsContainerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDmsContainer extends EditRecord
{
    protected static string $resource = DmsContainerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
