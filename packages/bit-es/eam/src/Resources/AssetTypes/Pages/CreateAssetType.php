<?php

namespace Bites\Eam\Resources\AssetTypes\Pages;

use Bites\Eam\Resources\AssetTypes\AssetTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAssetType extends CreateRecord
{
    protected static string $resource = AssetTypeResource::class;
}
