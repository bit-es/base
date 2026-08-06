<?php

namespace App\Filament\Staff\Pages;

use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class TaskStub extends Page
{
    protected static ?string $model = null; // No model set
    protected static string|UnitEnum|null $navigationGroup = 'My ToDos';
    protected static ?int $navigationSort = 1;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-task';
    protected static ?string $navigationLabel = 'Task';

    protected string $view = 'bites::pages.stub';
    
    public string $message = 'Display Tasks I have ..... Here!';
    
    public string $label;

    public function mount(): void
    {
        $this->label = static::$navigationLabel ?? 'Default Label';
    }

}
