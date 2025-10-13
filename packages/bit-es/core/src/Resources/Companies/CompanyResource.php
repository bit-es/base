<?php

namespace Bites\Core\Resources\Companies;

use Bites\Core\Resources\Companies\Pages\CreateCompany;
use Bites\Core\Resources\Companies\Pages\EditCompany;
use Bites\Core\Resources\Companies\Pages\ListCompanies;
use Bites\Core\Resources\Companies\Schemas\CompanyForm;
use Bites\Core\Resources\Companies\Tables\CompaniesTable;
use Bites\Core\Models\Company;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeAlt;
    protected static string|UnitEnum|null $navigationGroup = 'Organization Structure';
    protected static ?string $modelLabel = 'Companies';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CompanyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CompaniesTable::configure($table);
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
            'index' => ListCompanies::route('/'),
            'create' => CreateCompany::route('/create'),
            'edit' => EditCompany::route('/{record}/edit'),
        ];
    }
}
