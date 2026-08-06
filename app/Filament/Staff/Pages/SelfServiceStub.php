<?php

namespace App\Filament\Staff\Pages;

use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class SelfServiceStub extends Page
{
    protected static ?string $model = null; // No model set
    // protected static string|UnitEnum|null $navigationGroup = 'My Work';
    protected static ?int $navigationSort = 10;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-selfservice';
    protected static ?string $navigationLabel = 'Self Service';

    protected string $view = 'bites::pages.stub';
    
    public string $message = 'Display Menu for Self Service Here; listing Links to Employee Time Mgmt, Compensations, Benefits, etc.';
    
    public string $label;

    public function mount(): void
    {
        $this->label = static::$navigationLabel ?? 'Default Label';
    }

}
