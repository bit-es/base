<?php

namespace App\Filament\Core\Resources\FormSettings\Pages;

use App\Filament\Core\Resources\FormSettings\FormSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFormSetting extends EditRecord
{
    protected static string $resource = FormSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
