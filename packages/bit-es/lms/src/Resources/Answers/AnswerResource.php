<?php

namespace Bites\Lms\Resources\Answers;

use Bites\Lms\Resources\Answers\Pages\CreateAnswer;
use Bites\Lms\Resources\Answers\Pages\EditAnswer;
use Bites\Lms\Resources\Answers\Pages\ListAnswers;
use Bites\Lms\Resources\Answers\Schemas\AnswerForm;
use Bites\Lms\Resources\Answers\Tables\AnswersTable;
use Bites\Lms\Models\Answer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
class AnswerResource extends Resource
{
    protected static ?string $model = Answer::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCheckCircle;
    protected static string|UnitEnum|null $navigationGroup = 'Repository';
    protected static ?string $modelLabel = 'Answers';
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return AnswerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnswersTable::configure($table);
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
            'index' => ListAnswers::route('/'),
            'create' => CreateAnswer::route('/create'),
            'edit' => EditAnswer::route('/{record}/edit'),
        ];
    }
}
