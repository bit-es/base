<?php

namespace Bites\Core\Resources\Turtles\Pages;

use Bites\Core\Models\OrgUnit;
use Bites\Core\Resources\Turtles\TurtleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListTurtles extends ListRecords
{
    protected static string $resource = TurtleResource::class;

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
                ->modifyQueryUsing(fn (Builder $query) => $query->where('org_unit_id', $orgUnit->id));
        }

        return $tabs;
    }
}
