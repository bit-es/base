<?php

namespace Bites\Qas\Resources\CorrectiveActions\Pages;

use Bites\Qas\Resources\CorrectiveActions\CorrectiveActionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCorrectiveAction extends EditRecord
{
    protected static string $resource = CorrectiveActionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
