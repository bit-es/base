<?php

namespace Bites\Core\Resources\Classifies\Pages;

use Bites\Core\Resources\Classifies\ClassifyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditClassify extends EditRecord
{
    protected static string $resource = ClassifyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
