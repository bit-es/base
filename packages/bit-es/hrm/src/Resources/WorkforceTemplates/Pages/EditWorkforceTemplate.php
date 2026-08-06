<?php

namespace Bites\Hrm\Resources\WorkforceTemplates\Pages;

use Bites\Hrm\Resources\WorkforceTemplates\WorkforceTemplateResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditWorkforceTemplate extends EditRecord
{
    protected static string $resource = WorkforceTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
