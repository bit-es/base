<?php

namespace Bites\Core\Resources\Turtles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns;
use Filament\Tables\Table;

class TurtlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('code')->searchable(),
                Columns\TextColumn::make('name')->searchable(),
                Columns\TextColumn::make('orgUnit.name')->label('Ownership'),
                Columns\TextColumn::make('description')->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
