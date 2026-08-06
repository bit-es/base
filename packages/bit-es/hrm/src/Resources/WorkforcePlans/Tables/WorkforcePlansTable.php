<?php

namespace Bites\Hrm\Resources\WorkforcePlans\Tables;

use Bites\Hrm\Models\WorkforcePlan;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\Summarizers\Sum;

class WorkforcePlansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(
                WorkforcePlan::query()
                    // ->with(['orgUnit', 'workforceTemplate'])
                    ->withCount(['jobPositions as actual'])
            )
            ->columns([
                TextColumn::make('orgUnit.name')
                    ->searchable(),
                // TextColumn::make('job_title_id')
                //     ->numeric()
                //     ->sortable(),
                TextColumn::make('title')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('required_quantity')
                    ->label('Planned')
                    // ->summarize(Sum::make())
                    ->sortable(),
                TextColumn::make('job_positions_count')
                    ->label('Actual')
                    ->counts('jobPositions')
                    // ->summarize(Sum::make())
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
            ->groups([
                'orgUnit.name',
                'title',
            ])
            // ->groupsOnly()
            ->defaultGroup('title')
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
