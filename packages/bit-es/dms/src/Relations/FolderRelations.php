<?php

namespace Bites\Dms\Relations;

use Filament\Actions\AssociateAction;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class FolderRelations extends RelationManager
{
    protected static string $relationship = 'folders';

    public static function getTabComponent(Model $ownerRecord, string $pageClass): Tab
    {
        // dd($ownerRecord, $pageClass);

        return Tab::make('Folders')
            ->icon(Heroicon::OutlinedFolderOpen);
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('path')->required()->columnSpanFull(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('path')->searchable(),
            ])
            ->headerActions([
                CreateAction::make()->label('Add')->modalWidth('6xl'),
                // AssociateAction::make(),
            ]);
    }
}
