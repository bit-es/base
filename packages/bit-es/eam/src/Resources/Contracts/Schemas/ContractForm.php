<?php

namespace Bites\Eam\Resources\Contracts\Schemas;

use Bites\Core\Models\Company;
use Bites\Eam\Enums\ContractType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;

class ContractForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make([
                    TextInput::make('reference_number'),
                    Select::make('company_id')
                        ->relationship(
                            name: 'supplier',
                            titleAttribute: 'name',
                            modifyQueryUsing: fn($query) => $query->where('isSupplier', true)
                        )
                        ->required()
                        ->createOptionForm([
                            TextInput::make('name')
                                ->required(),
                            TextInput::make('code')
                                ->required(),
                            TextInput::make('description')
                                ->columnSpanFull(),
                            Hidden::make('isSupplier')->default(true),
                        ])
                        ->createOptionUsing(function (array $data): int {
                            $company = Company::create($data);
                            return $company->getKey();
                        }),
                    Fieldset::make('Duration')->schema([
                        DatePicker::make('start_date')->required(),
                        DatePicker::make('end_date')->required(),
                    ]),
                    Textarea::make('terms'),

                ]),
                Section::make([
                    Radio::make('contract_type')
                        ->options(ContractType::class)
                        ->required(),

                ]),
                Select::make('assets')
                    ->multiple()
                    ->relationship('assets', 'name'),

                Select::make('inventoryItems')
                    ->multiple()
                    ->relationship('inventoryItems', 'name'),

            ]);
    }
}
