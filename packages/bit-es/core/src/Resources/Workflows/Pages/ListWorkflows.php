<?php

namespace Bites\Core\Resources\Workflows\Pages;

use Bites\Core\Resources\Workflows\WorkflowResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Bites\Core\Models\OrgUnit;
use Illuminate\Database\Eloquent\Builder;

class ListWorkflows extends ListRecords
{
    protected static string $resource = WorkflowResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        $tabs = [];

        // Default "All" tab
        $tabs['all'] = Tab::make('All');

        // Dynamic tabs for each orgUnit

        foreach (OrgUnit::all() as $orgUnit) {
            $tabs[$orgUnit->slug ?? $orgUnit->id] = Tab::make($orgUnit->name)
                ->modifyQueryUsing(
                    fn(Builder $query) =>
                    $query->whereHas(
                        'turtle',
                        fn($q) =>
                        $q->where('org_unit_id', $orgUnit->id)
                    )
                );
        }


        return $tabs;
    }
}
