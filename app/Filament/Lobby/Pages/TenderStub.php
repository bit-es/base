<?php

namespace App\Filament\Lobby\Pages;

use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class TenderStub extends Page
{
    protected static ?string $model = null; // No model set
    protected static ?int $navigationSort = 2;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-rfq';
    protected static ?string $navigationLabel = 'Open Tenders';

    protected string $view = 'bites::pages.stub';
    
    public string $message = 'Display RFQs, RFPs, Tenders .... Here!';
    
    public string $label;

    public function mount(): void
    {
        $this->label = static::$navigationLabel ?? 'Default Label';
    }

}
