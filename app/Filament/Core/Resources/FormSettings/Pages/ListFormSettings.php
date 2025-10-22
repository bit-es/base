<?php

namespace App\Filament\Core\Resources\FormSettings\Pages;

use App\Filament\Core\Resources\FormSettings\FormSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormSettings extends ListRecords
{
    protected static string $resource = FormSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
