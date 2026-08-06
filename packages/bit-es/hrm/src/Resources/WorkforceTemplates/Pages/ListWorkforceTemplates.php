<?php

namespace Bites\Hrm\Resources\WorkforceTemplates\Pages;

use Bites\Hrm\Resources\WorkforceTemplates\WorkforceTemplateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWorkforceTemplates extends ListRecords
{
    protected static string $resource = WorkforceTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
