<?php

namespace Bites\Hrm\Resources\WorkforcePlans\Pages;

use Bites\Hrm\Resources\WorkforcePlans\WorkforcePlanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWorkforcePlan extends EditRecord
{
    protected static string $resource = WorkforcePlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
