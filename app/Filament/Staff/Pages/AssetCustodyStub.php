<?php

namespace App\Filament\Staff\Pages;

use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class AssetCustodyStub extends Page
{
    protected static ?string $model = null; // No model set
    protected static string|UnitEnum|null $navigationGroup = 'Equipment';
    protected static ?int $navigationSort = 33;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-asset-own';
    protected static ?string $navigationLabel = 'Ownership';

    protected string $view = 'bites::pages.stub';
    
    public string $message = 'Display asset/equipment under my custody .... Here!';
    
    public string $label;

    public function mount(): void
    {
        $this->label = static::$navigationLabel ?? 'Default Label';
    }

}
