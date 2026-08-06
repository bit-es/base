<?php

namespace App\Filament\Staff\Pages;

use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class ApprovalStub extends Page
{
    protected static ?string $model = null; // No model set
    protected static string|UnitEnum|null $navigationGroup = 'My ToDos';
    protected static ?int $navigationSort = 3;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-approval';
    protected static ?string $navigationLabel = 'Approval';

    protected string $view = 'bites::pages.stub';
    
    public string $message = 'Display items needing my approval .... Here!';
    
    public string $label;

    public function mount(): void
    {
        $this->label = static::$navigationLabel ?? 'Default Label';
    }

}
