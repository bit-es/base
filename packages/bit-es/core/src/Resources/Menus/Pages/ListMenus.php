<?php

namespace Bites\Core\Resources\Menus\Pages;

use Bites\Core\Models\Menu;
use Bites\Core\Resources\Menus\MenuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListMenus extends ListRecords
{
    protected static string $resource = MenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $categories = Menu::query()
            ->select('category')
            ->distinct()
            ->pluck('category')
            ->filter() // remove nulls if needed
            ->toArray();

        $tabs = [];

        $tabs['all'] = Tab::make(); // default tab showing all records

        foreach ($categories as $category) {
            $tabs[$category] = Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category', $category));
        }

        return $tabs;
    }
}
