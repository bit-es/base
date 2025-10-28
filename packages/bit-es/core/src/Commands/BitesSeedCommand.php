<?php

namespace Bites\Core\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class BitesSeedCommand extends Command
{
    protected $signature = 'bites:seed {source} {--mode=update}';

    protected $description = 'Seed database from JSON file or URL into models, relations, and ext attributes';

    public function handle(): void
    {
        $source = $this->argument('source');
        $mode = $this->option('mode');

        $content = Str::startsWith($source, ['http://', 'https://'])
            ? Http::get($source)->body()
            : File::get($source);

        $cleaned = preg_replace('/^\xEF\xBB\xBF/', '', $content); // Remove UTF-8 BOM
        $cleaned = str_replace(["\r\n", "\r"], "\n", $cleaned);   // Normalize line endings

        $json = json_decode($cleaned, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->error('Invalid JSON: '.json_last_error_msg());

            return;
        }

        if (! $json) {
            $this->error('Invalid JSON');

            return;
        }

        $namespaces = Config::get('bites.model_namespaces', []);

        foreach ($json as $modelName => $records) {
            $class = $this->resolveModelClass($modelName, $namespaces);

            if (! $class) {
                $this->warn("Skipping unknown model: $modelName");

                continue;
            }

            foreach ($records as $record) {
                $this->seedModel($class, $record, $mode);
            }

            $this->info("$modelName seeded!");
        }

        $this->info('Seeding complete!');
    }

    protected function resolveModelClass(string $modelName, array $namespaces): ?string
    {
        foreach ($namespaces as $namespace) {
            $candidate = $namespace.$modelName;
            if (class_exists($candidate)) {
                return $candidate;
            }
        }

        return null;
    }

    protected function resolveMorphToClass(array $data): ?string
    {
        $type = $data['type'] ?? null;
        if (! $type) {
            return null;
        }

        $namespaces = Config::get('bites.model_namespaces', []);
        foreach ($namespaces as $namespace) {
            $candidate = $namespace.$type;
            if (class_exists($candidate)) {
                return $candidate;
            }
        }

        return null;
    }

    protected function isUniqueColumn(Model $model, string $column): bool
    {
        $table = $model->getTable();
        $schemaManager = $model->getConnection()->getDoctrineSchemaManager();
        $indexes = $schemaManager->listTableIndexes($table);

        foreach ($indexes as $index) {
            if ($index->isUnique() && in_array($column, $index->getColumns())) {
                return true;
            }
        }

        return false;
    }

    protected function seedModel(string $class, array $record, string $mode, ?Model $parent = null): ?Model
    {
        if (method_exists($class, 'resolveAndCreate')) {
            return $class::resolveAndCreate($record);
        }

        $relations = [];
        $data = [];

        foreach ($record as $key => $value) {
            if (is_array($value) && $this->isRelation($class, $key)) {
                $relations[$key] = $value;
            } else {
                $data[$key] = $value;
            }
        }

        $model = new $class;
        $columns = $model->getConnection()->getSchemaBuilder()->getColumnListing($model->getTable());
        $fillable = array_intersect(array_keys($data), $columns);
        $coreData = array_intersect_key($data, array_flip($fillable));
        $extData = array_diff_key($data, $coreData);

        // Combine hardcoded and schema-based unique keys
        $hardcodedUniqueKeys = ['slug', 'code', 'email', 'username', 'name', 'asset_tag'];
        $connection = $model->getConnection();
        $driver = $connection->getDriverName();

        $conditions = [];
        foreach ($coreData as $key => $value) {
            if (
                in_array($key, $hardcodedUniqueKeys) ||
                ($driver !== 'sqlite' && $this->isUniqueColumn($model, $key))
            ) {
                $conditions[$key] = $value;
            }
        }

        if ($mode === 'update' && $conditions) {
            $instance = $class::updateOrCreate($conditions, $coreData);
        } else {
            if ($conditions && $class::where($conditions)->exists()) {
                $this->line("Skipped existing $class with ".json_encode($conditions));

                return null;
            }
            $instance = $class::create($coreData);
        }

        foreach ($extData as $key => $value) {
            $instance->extAttributes()->updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        foreach ($relations as $relation => $items) {
            $rel = $instance->$relation();

            $relatedClass = $rel instanceof \Illuminate\Database\Eloquent\Relations\MorphTo
                ? $this->resolveMorphToClass($items)
                : get_class($rel->getModel());

            if (! $relatedClass) {
                $this->warn("Unable to resolve related class for relation: $relation");

                continue;
            }

            if (
                $rel instanceof \Illuminate\Database\Eloquent\Relations\BelongsToMany ||
                $rel instanceof \Illuminate\Database\Eloquent\Relations\MorphToMany
            ) {
                foreach ($items as $child) {
                    $childInstance = $this->seedModel($relatedClass, $child, $mode, $instance);
                    if ($childInstance) {
                        $instance->$relation()->syncWithoutDetaching([$childInstance->id]);
                    }
                }
            } elseif (
                $rel instanceof \Illuminate\Database\Eloquent\Relations\HasMany ||
                $rel instanceof \Illuminate\Database\Eloquent\Relations\MorphMany
            ) {
                foreach ($items as $child) {
                    $this->seedModel($relatedClass, $child, $mode, $instance);
                }
            } elseif (
                $rel instanceof \Illuminate\Database\Eloquent\Relations\HasOne ||
                $rel instanceof \Illuminate\Database\Eloquent\Relations\MorphOne ||
                $rel instanceof \Illuminate\Database\Eloquent\Relations\BelongsTo
            ) {
                $this->seedModel($relatedClass, $items, $mode, $instance);
            } elseif ($rel instanceof \Illuminate\Database\Eloquent\Relations\MorphTo) {
                $relatedId = $items['id'] ?? null;
                if ($relatedId) {
                    $relatedInstance = $relatedClass::find($relatedId);
                    if ($relatedInstance) {
                        $instance->$relation()->associate($relatedInstance);
                        $instance->save();
                    }
                }
            }
        }

        return $instance;
    }

    protected function isRelation(string $class, string $method): bool
    {
        if (! method_exists($class, $method)) {
            return false;
        }

        try {
            return $class::$method() instanceof \Illuminate\Database\Eloquent\Relations\Relation;
        } catch (\Throwable $e) {
            return false;
        }
    }
}
