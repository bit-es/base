<?php

namespace Bites\Eam\Resources\Contracts;

use BackedEnum;
use Bites\Eam\Models\Contract;
use Bites\Eam\Resources\Contracts\Pages\CreateContract;
use Bites\Eam\Resources\Contracts\Pages\EditContract;
use Bites\Eam\Resources\Contracts\Pages\ListContracts;
use Bites\Eam\Resources\Contracts\Pages\ViewContract;
use Bites\Eam\Resources\Contracts\Schemas\ContractForm;
use Bites\Eam\Resources\Contracts\Schemas\ContractInfolist;
use Bites\Eam\Resources\Contracts\Tables\ContractsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class ContractResource extends Resource
{
    protected static ?string $model = Contract::class;

    protected static string|BackedEnum|null $navigationIcon = 'myicon-c-contract';

    // protected static string|UnitEnum|null $navigationGroup = 'Contract Management';

    protected static ?string $modelLabel = 'Contracts';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'reference_number';

    public static function form(Schema $schema): Schema
    {
        return ContractForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        $temp=ContractInfolist::configure($schema);
        dump($schema);
        return $temp;
    }

    public static function table(Table $table): Table
    {
        return ContractsTable::configure($table);
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
            'index' => ListContracts::route('/'),
            'create' => CreateContract::route('/create'),
            'view' => ViewContract::route('/{record}'),
            'edit' => EditContract::route('/{record}/edit'),
        ];
    }
}
