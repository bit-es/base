<?php

namespace Bites\Qas\Resources\CorrectiveActions\Pages;

use Bites\Qas\Resources\CorrectiveActions\CorrectiveActionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCorrectiveAction extends CreateRecord
{
    protected static string $resource = CorrectiveActionResource::class;
}
