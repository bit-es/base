<?php

namespace Bites\Lms\Resources\Quizzes;

use BackedEnum;
use Bites\Lms\Models\Quiz;
use Bites\Lms\Resources\Quizzes\Pages\CreateQuiz;
use Bites\Lms\Resources\Quizzes\Pages\EditQuiz;
use Bites\Lms\Resources\Quizzes\Pages\ListQuizzes;
use Bites\Lms\Resources\Quizzes\Schemas\QuizForm;
use Bites\Lms\Resources\Quizzes\Tables\QuizzesTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class QuizResource extends Resource
{
    protected static ?string $model = Quiz::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInboxStack;

    protected static string|UnitEnum|null $navigationGroup = 'Repository';

    protected static ?string $modelLabel = 'Quizzes';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return QuizForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QuizzesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListQuizzes::route('/'),
            'create' => CreateQuiz::route('/create'),
            'edit' => EditQuiz::route('/{record}/edit'),
        ];
    }
}
