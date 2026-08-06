<?php

namespace App\Filament\Lobby\Pages;

use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class VisitorRegisterStub extends Page
{
    protected static ?string $model = null; // No model set
    protected static ?int $navigationSort = 1;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-p-lobby';
    protected static ?string $navigationLabel = 'Register';

    protected string $view = 'bites::pages.stub';
    
    public string $message = 'Register as Visitor for Candidate, Vendor or Customer .... Here!';
    
    public string $label;

    public function mount(): void
    {
        $this->label = static::$navigationLabel ?? 'Default Label';
    }

}
