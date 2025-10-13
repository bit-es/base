<?php

namespace Bites\Erp\Resources\CostElements\Pages;

use Bites\Erp\Resources\CostElements\CostElementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCostElements extends ListRecords
{
    protected static string $resource = CostElementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
