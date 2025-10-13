<?php

namespace Bites\Core\Resources\Classifies\Pages;

use Bites\Core\Resources\Classifies\ClassifyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClassifies extends ListRecords
{
    protected static string $resource = ClassifyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
