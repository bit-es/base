<?php

namespace Bites\Lms\Resources\Quizzes\Pages;

use Bites\Lms\Resources\Quizzes\QuizResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQuiz extends EditRecord
{
    protected static string $resource = QuizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
