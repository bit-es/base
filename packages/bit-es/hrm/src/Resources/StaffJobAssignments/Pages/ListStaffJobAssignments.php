<?php

namespace Bites\Hrm\Resources\StaffJobAssignments\Pages;

use Bites\Hrm\Resources\StaffJobAssignments\StaffJobAssignmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStaffJobAssignments extends ListRecords
{
    protected static string $resource = StaffJobAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
