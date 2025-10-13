<?php

namespace Bites\Dms\Relations;

use Filament\Actions\AssociateAction;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class FileRelations extends RelationManager
{
    protected static string $relationship = 'files';

    public static function getTabComponent(Model $ownerRecord, string $pageClass): Tab
    {
        // dd($ownerRecord, $pageClass);

        return Tab::make('Files')
            ->icon(Heroicon::OutlinedDocument);
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('filename')->required(),
            Forms\Components\TextInput::make('filepath')->nullable(),
            Forms\Components\DateTimePicker::make('modified_at')->nullable(),
            Forms\Components\Select::make('level')
                ->options(\Bites\Dms\Enums\DocumentClassification::class)
                ->required(),
            Forms\Components\Select::make('uploaded_by')
                ->relationship('uploader', 'name')
                ->searchable()
                ->nullable(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('filename')->searchable(),
                Columns\TextColumn::make('level'),
                Columns\TextColumn::make('uploader.name')->label('Uploaded By'),
            ])
            ->headerActions([
                CreateAction::make()->label('Add')->modalWidth('6xl'),
                // AssociateAction::make(),
            ]);
    }
}
