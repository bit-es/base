<?php

namespace Bites\Qas\Resources\QualityStandards\Pages;

use Bites\Qas\Resources\QualityStandards\QualityStandardResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQualityStandard extends EditRecord
{
    protected static string $resource = QualityStandardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
