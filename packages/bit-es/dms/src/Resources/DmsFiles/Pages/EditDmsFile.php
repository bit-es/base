<?php

namespace Bites\Dms\Resources\DmsFiles\Pages;

use Bites\Dms\Resources\DmsFiles\DmsFileResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDmsFile extends EditRecord
{
    protected static string $resource = DmsFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
