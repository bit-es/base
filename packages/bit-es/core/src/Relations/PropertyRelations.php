<?php

namespace Bites\Core\Relations;

use Filament\Forms\Components;
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
        return $schema->components(function (RelationManager $livewire) {
            $record = $livewire->getOwnerRecord();

            // Attempt to get the first related setting with a form schema
            $setting = $record->classifies()
                ->with('settings')
                ->get()
                ->pluck('settings')
                ->flatten()
                ->firstWhere('applies_to', 'Property');

            if ($setting && is_array($setting->form_schema)) {
                return $setting->form_schema;
            }

            // Fallback schema
            return [
                Components\TextInput::make('key')->required(),
                Components\TextInput::make('value'),
                Components\TextInput::make('uom')->label('Unit of Measure'),
            ];
        });
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
