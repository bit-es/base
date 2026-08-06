<?php

namespace Bites\Core\Resources;


use Filament\Resources\Resource;
use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;

class LifecycleStub extends Page
{
    protected static ?string $model = null; // No model set
    protected static string|UnitEnum|null $navigationGroup = 'My Work';
    protected static ?int $navigationSort = 10;
    protected static string|BackedEnum|null $navigationIcon = 'myicon-c-workflow';
    protected static ?string $navigationLabel = 'Task';

    protected string $view = 'bites::pages.stub';
    
    public string $message = 'Display Tasks Here';
    
    public string $label;

    public function mount(): void
    {
        $this->label = static::$navigationLabel ?? 'Default Label';
    }

}
