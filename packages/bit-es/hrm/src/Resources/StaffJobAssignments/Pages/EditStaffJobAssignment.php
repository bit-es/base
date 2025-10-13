<?php

namespace Bites\Hrm\Resources\StaffJobAssignments\Pages;

use Bites\Hrm\Resources\StaffJobAssignments\StaffJobAssignmentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStaffJobAssignment extends EditRecord
{
    protected static string $resource = StaffJobAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
