<?php

namespace Bites\Core\Resources\Movements\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MovementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('movable_type')
                    ->searchable(),
                TextColumn::make('movable_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('from_location_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('to_location_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('moved_at')
                    ->dateTime()
                    ->sortable(),
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
