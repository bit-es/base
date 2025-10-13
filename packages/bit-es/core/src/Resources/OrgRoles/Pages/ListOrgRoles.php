<?php

namespace Bites\Core\Resources\OrgRoles\Pages;

use Bites\Core\Resources\OrgRoles\OrgRoleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOrgRoles extends ListRecords
{
    protected static string $resource = OrgRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
