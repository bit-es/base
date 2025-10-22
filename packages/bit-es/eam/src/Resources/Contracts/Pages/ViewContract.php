<?php

namespace Bites\Eam\Resources\Contracts\Pages;

use Bites\Eam\Resources\Contracts\ContractResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewContract extends ViewRecord
{
    protected static string $resource = ContractResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
