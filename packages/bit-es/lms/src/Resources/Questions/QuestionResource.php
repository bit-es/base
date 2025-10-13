<?php

namespace Bites\Lms\Resources\Questions;

use Bites\Lms\Resources\Questions\Pages\CreateQuestion;
use Bites\Lms\Resources\Questions\Pages\EditQuestion;
use Bites\Lms\Resources\Questions\Pages\ListQuestions;
use Bites\Lms\Resources\Questions\Schemas\QuestionForm;
use Bites\Lms\Resources\Questions\Tables\QuestionsTable;
use Bites\Lms\Models\Question;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedQuestionMarkCircle;
    protected static string|UnitEnum|null $navigationGroup = 'Repository';
    protected static ?string $modelLabel = 'Questions';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return QuestionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QuestionsTable::configure($table);
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
            'index' => ListQuestions::route('/'),
            'create' => CreateQuestion::route('/create'),
            'edit' => EditQuestion::route('/{record}/edit'),
        ];
    }
}
