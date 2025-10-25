<?php

namespace Bites\Qas\Resources\Methodologies\Pages;

use Bites\Qas\Resources\Methodologies\MethodologyResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMethodology extends EditRecord
{
    protected static string $resource = MethodologyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
