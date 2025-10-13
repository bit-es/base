<?php

namespace Bites\Lms\Resources\Answers\Pages;

use Bites\Lms\Resources\Answers\AnswerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAnswer extends CreateRecord
{
    protected static string $resource = AnswerResource::class;
}
