<?php

namespace Bites\Core\Resources\Classifies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns;
use Filament\Tables\Table;

class ClassifiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('full_path'),
                Columns\TextColumn::make('classifiable_type')->label('Type'),
                Columns\TextColumn::make('classifiable_id')->label('ID'),
                Columns\TextColumn::make('parent.name')->label('Parent'),
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
