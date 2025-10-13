<?php

namespace Bites\Core\Relations;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class PropertyRelations extends RelationManager
{
    protected static string $relationship = 'properties';

    public static function getTabComponent(Model $ownerRecord, string $pageClass): Tab
    {
        return Tab::make('Properties')
            ->icon('heroicon-m-rectangle-group');
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('setting_id')
                ->relationship('setting', 'name')
                ->searchable()
                ->nullable(),

            TextInput::make('key')->required(),
            TextInput::make('value')->nullable(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('key'),
            TextColumn::make('value'),
            TextColumn::make('recorded_at')->dateTime(),
            TextColumn::make('setting.name')->label('Setting'),
        ]);
    }
}
