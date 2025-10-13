<?php

namespace Bites\Qas\Resources\QualityStandards\Pages;

use Bites\Qas\Resources\QualityStandards\QualityStandardResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQualityStandards extends ListRecords
{
    protected static string $resource = QualityStandardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
