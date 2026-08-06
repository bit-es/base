<?php

namespace App\Filament\Staff\Pages;

use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class AssetShopStub extends Page
{
    protected static ?string $model = null; // No model set
    protected static string|UnitEnum|null $navigationGroup = 'Equipment';
    protected static ?int $navigationSort = 31;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-asset-find';
    protected static ?string $navigationLabel = 'Request';

    protected string $view = 'bites::pages.stub';
    
    public string $message = 'Display looking for equipment in shop.... Here!';
    
    public string $label;

    public function mount(): void
    {
        $this->label = static::$navigationLabel ?? 'Default Label';
    }

}
