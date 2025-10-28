<?php

namespace Bites\Core\Traits;

use Bites\Core\Models\Csa\Classify;
use Bites\Core\Models\Csa\Event;
use Bites\Core\Models\Csa\Metric;
use Bites\Core\Models\Csa\Property;
use Bites\Core\Models\Csa\Snapshot;
use Bites\Core\Models\Csa\Task;
use Bites\Core\Models\ExtAttribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasClassStructuredAttributes
{
    public static function bootHasClassStructuredAttributes(): void
    {
        static::deleting(function ($model) {
            foreach (['classifies', 'properties', 'metrics', 'tasks', 'events', 'snapshots'] as $relation) {
                if (method_exists($model, $relation)) {
                    $model->$relation()->get()->each->delete();
                }
            }
        });
    }

    // Relations
    public function classifies(): MorphToMany
    {
        return $this->morphToMany(Classify::class, 'classifiable')->withPivot('setting_id')->withTimestamps();
    }

    public function properties(): MorphMany
    {
        return $this->morphMany(Property::class, 'propertable');
    }

    public function metrics(): MorphMany
    {
        return $this->morphMany(Metric::class, 'metricable');
    }

    public function tasks(): MorphMany
    {
        return $this->morphMany(Task::class, 'taskable');
    }

    public function events(): MorphMany
    {
        return $this->morphMany(Event::class, 'eventable');
    }

    public function snapshots(): MorphMany
    {
        return $this->morphMany(Snapshot::class, 'snapshotable');
    }

    // Helper for Property
    public function getProperty(string $key, $default = null): mixed
    {
        return $this->properties->firstWhere('key', $key)?->value ?? $default;
    }

    public function addProperty(string $key, $value, $settingId = null): Property
    {
        return $this->properties()->create(['key' => $key, 'value' => $value, 'setting_id' => $settingId]);
    }

    public function hasProperty(string $key): bool
    {
        return $this->properties->contains('key', $key);
    }

    // Helper for Metric
    public function getMetric(string $key, $default = null): mixed
    {
        return $this->metrics->firstWhere('key', $key)?->value ?? $default;
    }

    public function recordMetric(string $key, $value, $settingId = null, $measuredAt = null): Metric
    {
        return $this->metrics()->create(['key' => $key, 'value' => $value, 'setting_id' => $settingId, 'recorded_at' => $measuredAt]);
    }

    public function hasMetric(string $key): bool
    {
        return $this->metrics->contains('key', $key);
    }

    // Helper for Task
    public function assignTask(array $data, $settingId = null): Task
    {
        $data['setting_id'] = $settingId ?? ($data['setting_id'] ?? null);

        return $this->tasks()->create($data);
    }

    public function hasTask(string $title): bool
    {
        return $this->tasks->contains('title', $title);
    }

    // Helper for Event
    public function scheduleEvent(array $data, $settingId = null): Event
    {
        $data['setting_id'] = $settingId ?? ($data['setting_id'] ?? null);

        return $this->events()->create($data);
    }

    public function hasEvent(string $title): bool
    {
        return $this->events->contains('title', $title);
    }

    // Helper for Snapshot
    public function takeSnapshot(array $data, $settingId = null): Snapshot
    {
        $data['setting_id'] = $settingId ?? ($data['setting_id'] ?? null);

        return $this->snapshots()->create($data);
    }

    public function hasSnapshot(string $title): bool
    {
        return $this->snapshots->contains('title', $title);
    }

    // Helper for Extra Attribute
    public function extAttributes(): MorphMany
    {
        return $this->morphMany(ExtAttribute::class, 'attributable');
    }

    public function getExtAttribute(string $key, $default = null): mixed
    {
        return $this->extAttributes->firstWhere('key', $key)?->value ?? $default;
    }

    public function setExtAttribute(string $key, $value): void
    {
        $this->extAttributes()->updateOrCreate(['key' => $key], ['value' => $value]);
    }

    public function hasExtAttribute(string $relation, string $key, $value): bool
    {
        return method_exists($this, $relation)
            && $this->$relation()->get()->contains($key, $value);
    }
}
