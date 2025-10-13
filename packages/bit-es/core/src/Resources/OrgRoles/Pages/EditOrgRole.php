<?php

namespace Bites\Core\Resources\OrgRoles\Pages;

use Bites\Core\Resources\OrgRoles\OrgRoleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditOrgRole extends EditRecord
{
    protected static string $resource = OrgRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
