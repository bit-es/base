<?php

namespace Bites\Qas\Resources\NonConformities\Pages;

use Bites\Qas\Resources\NonConformities\NonConformityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditNonConformity extends EditRecord
{
    protected static string $resource = NonConformityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
