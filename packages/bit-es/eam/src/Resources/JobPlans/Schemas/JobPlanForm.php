<?php

namespace Bites\Eam\Resources\JobPlans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class JobPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('jpnum')
                    ->required(),
                TextInput::make('description')
                    ->required(),
                TextInput::make('instruction_doc_id')
                    ->numeric(),
            ]);
    }
}
