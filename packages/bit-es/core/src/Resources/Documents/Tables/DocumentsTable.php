<?php

namespace Bites\Core\Resources\Documents\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns;
use Filament\Tables\Table;

class DocumentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('code'),
                Columns\TextColumn::make('title'),
                Columns\TextColumn::make('type'),
                Columns\TextColumn::make('description'),
                Columns\TextColumn::make('file_path'),
            ])
            //             $table->string('code')->unique(); // e.g., SOP-MFG-01
            // $table->string('title');
            // $table->enum('type', ['SOP', 'WI', 'FORM']); // or use a DocType enum
            // $table->text('description')->nullable();
            // $table->string('file_path')->nullable(); // optional: for actual file storage
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
