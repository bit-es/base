<?php

namespace Bites\Qas\Resources\CorrectiveActions\Pages;

use Bites\Qas\Resources\CorrectiveActions\CorrectiveActionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCorrectiveActions extends ListRecords
{
    protected static string $resource = CorrectiveActionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
