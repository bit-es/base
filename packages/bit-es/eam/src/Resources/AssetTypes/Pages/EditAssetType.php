<?php

namespace Bites\Eam\Resources\AssetTypes\Pages;

use Bites\Eam\Resources\AssetTypes\AssetTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditAssetType extends EditRecord
{
    protected static string $resource = AssetTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
