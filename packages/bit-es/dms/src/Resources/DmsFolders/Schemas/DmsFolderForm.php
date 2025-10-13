<?php

namespace Bites\Dms\Resources\DmsFolders\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class DmsFolderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('d_container_id')
                    ->relationship('container', 'name')
                    ->required(),
                Forms\Components\TextInput::make('path')->required(),
            ]);
    }
}
