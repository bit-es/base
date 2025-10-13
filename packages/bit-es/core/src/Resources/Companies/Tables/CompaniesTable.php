<?php

namespace Bites\Core\Resources\Companies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns;
use Filament\Tables\Table;

class CompaniesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('name'),
                Columns\TextColumn::make('code'),
                Columns\TextColumn::make('description'),
                Columns\CheckboxColumn::make('isCustomer'),
                Columns\CheckboxColumn::make('isSupplier'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
