<?php

namespace Bites\Qas\Resources\NonConformities;

use Bites\Qas\Resources\NonConformities\Pages\CreateNonConformity;
use Bites\Qas\Resources\NonConformities\Pages\EditNonConformity;
use Bites\Qas\Resources\NonConformities\Pages\ListNonConformities;
use Bites\Qas\Resources\NonConformities\Schemas\NonConformityForm;
use Bites\Qas\Resources\NonConformities\Tables\NonConformitiesTable;
use Bites\Qas\Models\NonConformity;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NonConformityResource extends Resource
{
    protected static ?string $model = NonConformity::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return NonConformityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NonConformitiesTable::configure($table);
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
            'index' => ListNonConformities::route('/'),
            'create' => CreateNonConformity::route('/create'),
            'edit' => EditNonConformity::route('/{record}/edit'),
        ];
    }
}
