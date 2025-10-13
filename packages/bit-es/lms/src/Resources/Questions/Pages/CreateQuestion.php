<?php

namespace Bites\Lms\Resources\Questions\Pages;

use Bites\Lms\Resources\Questions\QuestionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateQuestion extends CreateRecord
{
    protected static string $resource = QuestionResource::class;
}
