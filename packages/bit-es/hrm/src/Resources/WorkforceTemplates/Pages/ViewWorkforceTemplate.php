<?php

namespace Bites\Hrm\Resources\WorkforceTemplates\Pages;

use Bites\Hrm\Resources\WorkforceTemplates\WorkforceTemplateResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewWorkforceTemplate extends ViewRecord
{
    protected static string $resource = WorkforceTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
