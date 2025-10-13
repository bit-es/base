<?php

namespace Bites\Dms\Resources\DmsContainers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Bites\Dms\Models\DmsContainer;
use Bites\Core\Models\OrgUnit;

class DmsContainersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('name')->searchable(),
                Columns\TextColumn::make('level'),
                Columns\TextColumn::make('orgUnit.name')->label('Org Unit'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])

            ->toolbarActions([
                Action::make('generateContainers')
                    ->label('Generate Containers')
                    ->icon('heroicon-o-plus')
                    ->requiresConfirmation()
                    ->action(function () {
                        OrgUnit::all()->each(function ($orgUnit) {
                            DmsContainer::firstOrCreate(
                                ['org_unit_id' => $orgUnit->id, 'name' => $orgUnit->code . '-' . $orgUnit->type . '-Public'],
                                ['level' => 'L1']
                            );
                            DmsContainer::firstOrCreate(
                                ['org_unit_id' => $orgUnit->id, 'name' => $orgUnit->code . '-' . $orgUnit->type . '-Restricted'],
                                ['level' => 'L2']
                            );
                            DmsContainer::firstOrCreate(
                                ['org_unit_id' => $orgUnit->id, 'name' => $orgUnit->code . '-' . $orgUnit->type . '-Confidential'],
                                ['level' => 'L3']
                            );
                            DmsContainer::firstOrCreate(
                                ['org_unit_id' => $orgUnit->id, 'name' => $orgUnit->code . '-' . $orgUnit->type . '-StrictlyConfidential'],
                                ['level' => 'L4']
                            );
                        });
                    }),

                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
