<?php

namespace Bites\Lms\Resources\Courses\Pages;

use Bites\Lms\Resources\Courses\CourseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourse extends CreateRecord
{
    protected static string $resource = CourseResource::class;
}
