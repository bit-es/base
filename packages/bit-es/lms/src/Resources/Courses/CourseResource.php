<?php

namespace Bites\Lms\Resources\Courses;

use Bites\Lms\Resources\Courses\Pages\CreateCourse;
use Bites\Lms\Resources\Courses\Pages\EditCourse;
use Bites\Lms\Resources\Courses\Pages\ListCourses;
use Bites\Lms\Resources\Courses\Schemas\CourseForm;
use Bites\Lms\Resources\Courses\Tables\CoursesTable;
use Bites\Lms\Models\Course;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;
class CourseResource extends Resource
{
    protected static ?string $model = Course::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowRightEndOnRectangle;
    protected static string|UnitEnum|null $navigationGroup = 'Academy';
    protected static ?string $modelLabel = 'Courses';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return CourseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoursesTable::configure($table);
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
            'index' => ListCourses::route('/'),
            'create' => CreateCourse::route('/create'),
            'edit' => EditCourse::route('/{record}/edit'),
        ];
    }
}
