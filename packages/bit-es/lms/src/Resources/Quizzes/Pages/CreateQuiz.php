<?php

namespace Bites\Lms\Resources\Quizzes\Pages;

use Bites\Lms\Resources\Quizzes\QuizResource;
use Filament\Resources\Pages\CreateRecord;

class CreateQuiz extends CreateRecord
{
    protected static string $resource = QuizResource::class;
}
