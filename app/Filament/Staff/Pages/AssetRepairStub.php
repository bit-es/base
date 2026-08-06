<?php

namespace App\Filament\Staff\Pages;

use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class AssetRepairStub extends Page
{
    protected static ?string $model = null; // No model set
    protected static string|UnitEnum|null $navigationGroup = 'Equipment';
    protected static ?int $navigationSort = 34;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-asset-damage';
    protected static ?string $navigationLabel = 'Repair';

    protected string $view = 'bites::pages.stub';
    
    public string $message = 'Display for owned equipment under repair.... Here!';
    
    public string $label;

    public function mount(): void
    {
        $this->label = static::$navigationLabel ?? 'Default Label';
    }

}
