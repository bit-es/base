<?php

namespace Bites\Core\Resources\Classifies\Schemas;

use Bites\Core\Models\Csa\Classify;
use Filament\Forms;
use Filament\Schemas\Schema;

class ClassifyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('slug')->required(),
                Forms\Components\Select::make('classifiable_type')->options([
                    'App\\Models\\Staff' => 'Staff',
                    'App\\Models\\Asset' => 'Asset',
                    'App\\Models\\User' => 'User',
                ])->nullable(),
                Forms\Components\Select::make('parent_id')->label('Parent')
                    ->options(fn () => Classify::pluck('name', 'id')),
                Forms\Components\Textarea::make('description')->rows(3),
            ]);
    }
}
