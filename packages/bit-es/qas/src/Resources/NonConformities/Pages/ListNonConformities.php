<?php

namespace Bites\Qas\Resources\NonConformities\Pages;

use Bites\Qas\Resources\NonConformities\NonConformityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNonConformities extends ListRecords
{
    protected static string $resource = NonConformityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
