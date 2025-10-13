<?php

namespace Bites\Dms\Resources\DmsFiles\Pages;

use Bites\Dms\Resources\DmsFiles\DmsFileResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDmsFiles extends ListRecords
{
    protected static string $resource = DmsFileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
