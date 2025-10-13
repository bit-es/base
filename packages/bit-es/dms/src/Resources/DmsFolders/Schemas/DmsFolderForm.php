<?php

namespace Bites\Dms\Resources\DmsFolders\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class DmsFolderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('d_container_id')
                    ->relationship('container', 'name')
                    ->required(),
                Forms\Components\TextInput::make('path')->required()
            ]);
    }
}
