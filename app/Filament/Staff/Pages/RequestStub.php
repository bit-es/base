<?php

namespace App\Filament\Staff\Pages;

use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class RequestStub extends Page
{
    protected static ?string $model = null; // No model set
    protected static string|UnitEnum|null $navigationGroup = 'My ToDos';
    protected static ?int $navigationSort = 2;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-request';
    protected static ?string $navigationLabel = 'Request';

    protected string $view = 'bites::pages.stub';
    
    public string $message = 'Display requests I have made .... Here!';
    
    public string $label;

    public function mount(): void
    {
        $this->label = static::$navigationLabel ?? 'Default Label';
    }

}
