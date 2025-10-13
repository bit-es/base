<?php

namespace Bites\Core\Relations;

use Filament\Actions\AssociateAction;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class EventRelations extends RelationManager
{
    protected static string $relationship = 'events';

    public static function getTabComponent(Model $ownerRecord, string $pageClass): Tab
    {
        // dd($ownerRecord, $pageClass);

        return Tab::make('Events')
            ->icon('heroicon-o-calendar-days');
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('setting_id')
                ->relationship('setting', 'name')
                ->searchable()
                ->nullable(),

            TextInput::make('key')->required()->columnSpanFull(),
            TextInput::make('value')->nullable(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key'),
                TextColumn::make('value'),
                TextColumn::make('recorded_at')->dateTime(),
                TextColumn::make('setting.name')->label('Setting'),
            ])
            ->headerActions([
                CreateAction::make()->label('Add')->modalWidth('6xl'),
                // AssociateAction::make(),
            ]);
    }
}
