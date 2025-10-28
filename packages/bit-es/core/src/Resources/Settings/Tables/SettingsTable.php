<?php

namespace Bites\Core\Resources\Settings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;

class SettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // ->columns([
            //     Split::make([
            //         Columns\TextColumn::make('classify.full_path'),
            //         Stack::make([
            //             Columns\TextColumn::make('key_type')->icon('myicon-c-input'),
            //             Columns\TextColumn::make('key_options')->icon('myicon-c-options'),
            //         ]),
            //         Stack::make([
            //             Columns\TextColumn::make('value_type')->icon('myicon-c-input'),
            //             Columns\TextColumn::make('value_options')->icon('myicon-c-options'),
            //         ]),
            //     ])
            // ])
            ->columns([
                Columns\TextColumn::make('applies_to')->sortable(),
                Columns\TextColumn::make('classify.full_path')->label('Classify'),
                Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->defaultSort('updated_at', 'desc')
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
