<?php

namespace Bites\Core\Resources\OrgUnits\Pages;

use Bites\Core\Resources\OrgUnits\OrgUnitResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOrgUnit extends EditRecord
{
    protected static string $resource = OrgUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
