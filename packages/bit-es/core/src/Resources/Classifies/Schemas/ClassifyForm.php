<?php

namespace Bites\Core\Resources\Classifies\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class ClassifyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\Select::make('parent_id')
                    ->relationship('parent', 'name')
                    ->nullable(),
                Forms\Components\MorphToSelect::make('classifiable')
                    ->types([
                        Forms\Components\MorphToSelect\Type::make('model')->label('Model'),
                    ]),
            ]);

    }
}
