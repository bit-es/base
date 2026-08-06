<?php

namespace App\Filament\Lobby\Pages;

use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class CareerStub extends Page
{
    protected static ?string $model = null; // No model set
    protected static ?int $navigationSort = 3;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-job-search';
    protected static ?string $navigationLabel = 'Careers';

    protected string $view = 'bites::pages.stub';
    
    public string $message = 'Display job vacancies open to external .... Here!';
    
    public string $label;

    public function mount(): void
    {
        $this->label = static::$navigationLabel ?? 'Default Label';
    }

}
