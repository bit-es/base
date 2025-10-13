<?php

namespace Bites\Dms\Resources\DmsContainers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class DmsContainerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('org_unit_id')
                    ->relationship('orgUnit', 'name')
                    ->searchable()
                    ->nullable(),
                Forms\Components\Select::make('level')
                    ->options(\Bites\Dms\Enums\DocumentClassification::class)
                    ->required(),
                Forms\Components\TextInput::make('name')->nullable(),
            ]);
    }
}
