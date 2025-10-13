<?php

namespace Bites\Erp\Resources\CostElements\Pages;

use Bites\Erp\Resources\CostElements\CostElementResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCostElement extends EditRecord
{
    protected static string $resource = CostElementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
