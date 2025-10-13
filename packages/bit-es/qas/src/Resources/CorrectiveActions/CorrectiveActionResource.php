<?php

namespace Bites\Qas\Resources\CorrectiveActions;

use BackedEnum;
use Bites\Qas\Models\CorrectiveAction;
use Bites\Qas\Resources\CorrectiveActions\Pages\CreateCorrectiveAction;
use Bites\Qas\Resources\CorrectiveActions\Pages\EditCorrectiveAction;
use Bites\Qas\Resources\CorrectiveActions\Pages\ListCorrectiveActions;
use Bites\Qas\Resources\CorrectiveActions\Schemas\CorrectiveActionForm;
use Bites\Qas\Resources\CorrectiveActions\Tables\CorrectiveActionsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CorrectiveActionResource extends Resource
{
    protected static ?string $model = CorrectiveAction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CorrectiveActionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CorrectiveActionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCorrectiveActions::route('/'),
            'create' => CreateCorrectiveAction::route('/create'),
            'edit' => EditCorrectiveAction::route('/{record}/edit'),
        ];
    }
}
