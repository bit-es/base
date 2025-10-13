<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\Field;

class LocationPicker extends Field
{
    // protected string $view = 'bites::file-upload';
    protected string $view = 'bites::location-picker';

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(function (LocationPicker $component, $state) {
            if (is_array($state)) {
                $component->state($state);
            }
        });

        $this->dehydrateStateUsing(fn ($state) => $state);
    }
}
