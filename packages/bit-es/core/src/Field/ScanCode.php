<?php

namespace Bites\Core\Field;

use Filament\Forms\Components\TextInput;

class ScanCode extends TextInput
{
    protected string $view = 'bites::qr-scanner';

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label('Scan Code')
            ->extraAttributes([
                'icon' => 'heroicon-o-qr-code',
            ]);
    }
}
