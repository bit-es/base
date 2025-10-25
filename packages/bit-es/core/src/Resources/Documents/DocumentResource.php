<?php

namespace Bites\Core\Resources\Documents;

use BackedEnum;
use Bites\Core\Models\Document;
use Bites\Core\Resources\Documents\Pages\CreateDocument;
use Bites\Core\Resources\Documents\Pages\EditDocument;
use Bites\Core\Resources\Documents\Pages\ListDocuments;
use Bites\Core\Resources\Documents\Schemas\DocumentForm;
use Bites\Core\Resources\Documents\Tables\DocumentsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static string|BackedEnum|null $navigationIcon = 'myicon-c-docs';

    protected static string|UnitEnum|null $navigationGroup = 'Process Framework';

    protected static ?string $modelLabel = 'Documents';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return DocumentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DocumentsTable::configure($table);
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
            'index' => ListDocuments::route('/'),
            'create' => CreateDocument::route('/create'),
            'edit' => EditDocument::route('/{record}/edit'),
        ];
    }
}
