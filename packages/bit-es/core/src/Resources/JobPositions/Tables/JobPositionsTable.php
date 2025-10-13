<?php

namespace Bites\Core\Resources\JobPositions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns;

class JobPositionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Columns\TextColumn::make('orgUnit.code_and_type')
                //     ->label('Org Unit')
                //     ->formatStateUsing(function ($record) {
                //         return $record->orgUnit->code . ' - ' . $record->orgUnit->type;
                //     }),
                Columns\ColumnGroup::make('Org Unit', [
                    Columns\TextColumn::make('orgUnit.code')->alignEnd(),
                    Columns\TextColumn::make('orgUnit.type')->alignStart(),
                ]),
                Columns\TextColumn::make('title'),
                Columns\TextColumn::make('code'),
                Columns\TextColumn::make('description'),
                Columns\TextColumn::make('superior.title'),
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
