<?php

namespace Bites\Mes\Resources\WorkCenters\Pages;

use Bites\Mes\Resources\WorkCenters\WorkCenterResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWorkCenter extends EditRecord
{
    protected static string $resource = WorkCenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
