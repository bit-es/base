<?php

namespace Bites\Core\Resources\Settings\Pages;

use Bites\Core\Enums\SettingType;
use Bites\Core\Resources\Settings\SettingResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateSetting extends CreateRecord
{
    protected static string $resource = SettingResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $type = $data['applies_to'] ?? null;
        $fields = match ($type) {
            SettingType::Property => ['name', 'label', 'type', 'rules', 'options', 'required'],
            SettingType::Metric => ['key', 'value', 'unit_of_measure', 'date'],
            SettingType::Task => ['title', 'description', 'due_at', 'status'],
            SettingType::Event => ['title', 'description', 'start_at', 'end_at'],
            SettingType::Snapshot => ['title', 'image_url', 'location', 'taken_at', 'tag'],
            default => [],
        };

        $formBuilder = [];
        foreach ($fields as $field) {
            if (array_key_exists($field, $data)) {
                $formBuilder[$field] = $data[$field];
            }
        }
        $data['form_builder'] = $formBuilder;
        $data['form_schema'] = json_encode($formBuilder, JSON_PRETTY_PRINT);
        $newData = [];
        $newData['applies_to'] = $data['applies_to'];
        $newData['classify_id'] = $data['classify_id'];
        $newData['meta'] = $data['meta'];
        $newData['form_schema'] = $data['form_schema'];

        return static::getModel()::create($newData);
    }
}
