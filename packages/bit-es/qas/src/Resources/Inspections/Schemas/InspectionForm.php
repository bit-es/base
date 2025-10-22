<?php

namespace Bites\Qas\Resources\Inspections\Schemas;

use Filament\Actions\Action;
use Filament\Schemas\Schema;

class InspectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Action::make('scanCode')
                    ->label('Scan Code')
                    ->icon('heroicon-o-qr-code')
                    ->action('openScanner')
                    ->color('primary'),
            ]);
    }
}
