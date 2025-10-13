<?php

namespace Bites\Core\Enums;

enum SettingType: string
{
    case Metric = 'Metric';
    case Property = 'Property';
    case Snapshot = 'Snapshot';
    case Event = 'Event';
    case Task = 'Task';

    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }
}
