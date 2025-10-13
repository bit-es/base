<?php

namespace Bites\Core\Traits;

use Bites\Core\Models\Classify;
use Bites\Core\Models\Event;
use Bites\Core\Models\ExtAttribute;
use Bites\Core\Models\Metric;
use Bites\Core\Models\Property;
use Bites\Core\Models\Snapshot;
use Bites\Core\Models\Task;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait BitesModel
{
    public static function bootBitesModel(): void
    {
        static::deleting(function ($model) {
            if (method_exists($model, 'classify')) {
                $model->classify()->delete();
            }
            if (method_exists($model, 'properties')) {
                $model->properties()->delete();
            }
            if (method_exists($model, 'metrics')) {
                $model->metrics()->delete();
            }
            if (method_exists($model, 'tasks')) {
                $model->tasks()->delete();
            }
            if (method_exists($model, 'events')) {
                $model->events()->delete();
            }
            if (method_exists($model, 'snapshots')) {
                $model->snapshots()->delete();
            }
        });
    }

    // Relations
    public function classify(): MorphMany
    {
        return $this->morphMany(Classify::class, 'classifiable');
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

    // Helper actions
    public function addProperty(string $key, $value, $settingId = null)
    {
        return $this->properties()->create(['key' => $key, 'value' => $value, 'setting_id' => $settingId]);
    }

    public function recordMetric(string $key, $value, $settingId = null, $measuredAt = null)
    {
        return $this->metrics()->create(['key' => $key, 'value' => $value, 'setting_id' => $settingId, 'recorded_at' => $measuredAt]);
    }

    public function assignTask(array $data, $settingId = null)
    {
        $data['setting_id'] = $settingId ?? ($data['setting_id'] ?? null);

        return $this->tasks()->create($data);
    }

    public function scheduleEvent(array $data, $settingId = null)
    {
        $data['setting_id'] = $settingId ?? ($data['setting_id'] ?? null);

        return $this->events()->create($data);
    }

    public function takeSnapshot(array $data, $settingId = null)
    {
        $data['setting_id'] = $settingId ?? ($data['setting_id'] ?? null);

        return $this->snapshots()->create($data);
    }

    public function extAttributes()
    {
        return $this->morphMany(ExtAttribute::class, 'attributable');
    }

    public function getExtAttribute(string $key, $default = null)
    {
        return $this->extAttributes->firstWhere('key', $key)?->value ?? $default;
    }

    public function setExtAttribute(string $key, $value): void
    {
        $attribute = $this->extAttributes()->firstOrNew(['key' => $key]);
        $attribute->value = $value;
        $attribute->save();
    }
}
