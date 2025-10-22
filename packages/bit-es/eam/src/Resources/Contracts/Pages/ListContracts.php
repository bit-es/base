<?php

namespace Bites\Eam\Resources\Contracts\Pages;

use Bites\Eam\Resources\Contracts\ContractResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListContracts extends ListRecords
{
    protected static string $resource = ContractResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
