<?php

namespace Bites\Eam\Resources\WorkOrders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WorkOrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('wonum')
                    ->searchable(),
                TextColumn::make('asset.name')
                    ->searchable(),
                TextColumn::make('location.name')
                    ->searchable(),
                TextColumn::make('description')
                    ->searchable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('worktype')
                    ->searchable(),
                TextColumn::make('schedstart')
                    ->date()
                    ->sortable(),
                TextColumn::make('actualstart')
                    ->date()
                    ->sortable(),
                TextColumn::make('actualfinish')
                    ->date()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
