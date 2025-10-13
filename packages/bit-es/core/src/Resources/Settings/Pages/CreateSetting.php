<?php

namespace Bites\Core\Resources\Settings\Pages;

use Bites\Core\Resources\Settings\SettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSetting extends CreateRecord
{
    protected static string $resource = SettingResource::class;
}
