<?php

namespace Bites\Eam\Resources\Assets\Pages;

use Bites\Eam\Resources\Assets\AssetResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAsset extends ViewRecord
{
    protected static string $resource = AssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
