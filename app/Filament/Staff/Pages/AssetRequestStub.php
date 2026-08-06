<?php

namespace App\Filament\Staff\Pages;

use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class AssetRequestStub extends Page
{
    protected static ?string $model = null; // No model set
    protected static string|UnitEnum|null $navigationGroup = 'Equipment';
    protected static ?int $navigationSort = 32;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-asset-add';
    protected static ?string $navigationLabel = 'Request';

    protected string $view = 'bites::pages.stub';
    
    public string $message = 'Display request for equipment .... Here!';
    
    public string $label;

    public function mount(): void
    {
        $this->label = static::$navigationLabel ?? 'Default Label';
    }

}
