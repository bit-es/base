<?php

namespace Bites\Core\Enums;

enum SettingType: string
{
    case Property = 'Property';
    case Metric = 'Metric';
    case Task = 'Task';
    case Event = 'Event';
    case Snapshot = 'Snapshot';

    public static function options(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }

    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Property => 'heroicon-m-rectangle-group',
            self::Metric => 'heroicon-m-document-chart-bar',
            self::Task => 'heroicon-o-paper-clip',
            self::Event => 'heroicon-o-calendar-days',
            self::Snapshot => 'heroicon-o-camera',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::Property => 'Attributes with a single distinct value (no repeats)',
            self::Metric => 'Attributes with a progressive value (over time/periods)',
            self::Task => 'Attributes to a task visible in a todo',
            self::Event => 'Attributes to an event visible in a calendar',
            self::Snapshot => 'Attributes to a capture photo/image taken with device camera',
        };
    }
}
