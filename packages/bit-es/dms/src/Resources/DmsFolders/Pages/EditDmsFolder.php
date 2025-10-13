<?php

namespace Bites\Dms\Resources\DmsFolders\Pages;

use Bites\Dms\Resources\DmsFolders\DmsFolderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDmsFolder extends EditRecord
{
    protected static string $resource = DmsFolderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
