<?php

namespace Bites\Core\Resources\OrgUnits\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns;
use Filament\Tables\Table;

class OrgUnitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('company.name'),
                Columns\TextColumn::make('name'),
                Columns\TextColumn::make('code'),
                Columns\TextColumn::make('type'),
                Columns\TextColumn::make('description'),
                Columns\TextColumn::make('parent.name'),
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
