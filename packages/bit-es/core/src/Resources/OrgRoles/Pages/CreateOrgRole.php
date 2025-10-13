<?php

namespace Bites\Core\Resources\OrgRoles\Pages;

use Bites\Core\Resources\OrgRoles\OrgRoleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrgRole extends CreateRecord
{
    protected static string $resource = OrgRoleResource::class;
}
