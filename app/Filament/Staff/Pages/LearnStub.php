<?php

namespace App\Filament\Staff\Pages;

use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class LearnStub extends Page
{
    protected static ?string $model = null; // No model set
    // protected static string|UnitEnum|null $navigationGroup = 'My Work';
    protected static ?int $navigationSort = 20;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-p-lms';
    protected static ?string $navigationLabel = 'L&D';

    protected string $view = 'bites::pages.stub';
    
    public string $message = 'Display Menu for Learning & Development Here; listing courses available (as ESTs and CATs), in-progress, completed, etc.';
    // EST = Essential Skills Training (what is required for current job function); 
    // CAT = Career Advancement Training (career development opportunities and skills for future job functions);
    public string $label;

    public function mount(): void
    {
        $this->label = static::$navigationLabel ?? 'Default Label';
    }

}
