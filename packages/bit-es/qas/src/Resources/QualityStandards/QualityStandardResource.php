<?php

namespace Bites\Qas\Resources\QualityStandards;

use BackedEnum;
use Bites\Qas\Models\QualityStandard;
use Bites\Qas\Resources\QualityStandards\Pages\CreateQualityStandard;
use Bites\Qas\Resources\QualityStandards\Pages\EditQualityStandard;
use Bites\Qas\Resources\QualityStandards\Pages\ListQualityStandards;
use Bites\Qas\Resources\QualityStandards\Schemas\QualityStandardForm;
use Bites\Qas\Resources\QualityStandards\Tables\QualityStandardsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QualityStandardResource extends Resource
{
    protected static ?string $model = QualityStandard::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return QualityStandardForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QualityStandardsTable::configure($table);
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
            'index' => ListQualityStandards::route('/'),
            'create' => CreateQualityStandard::route('/create'),
            'edit' => EditQualityStandard::route('/{record}/edit'),
        ];
    }
}
