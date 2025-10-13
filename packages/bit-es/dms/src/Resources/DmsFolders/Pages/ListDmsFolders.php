<?php

namespace Bites\Dms\Resources\DmsFolders\Pages;

use Bites\Dms\Resources\DmsFolders\DmsFolderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDmsFolders extends ListRecords
{
    protected static string $resource = DmsFolderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
