<?php

namespace Bites\Eam\Resources\AssetTypes\Pages;

use Bites\Eam\Resources\AssetTypes\AssetTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAssetType extends ViewRecord
{
    protected static string $resource = AssetTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
