<?php

namespace Bites\Eam\Resources\SpareParts\Pages;

use Bites\Eam\Resources\SpareParts\SparePartResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSparePart extends EditRecord
{
    protected static string $resource = SparePartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
