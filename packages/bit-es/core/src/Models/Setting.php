<?php

namespace Bites\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'u_settings';

    protected $fillable = ['key', 'value', 'type', 'scope_id'];

    protected $casts = ['value' => 'array'];

    public function classify()
    {
        return $this->belongsTo(Classify::class, 'classify_id');
    }

    public static function get(string $key, $scope = null)
    {
        if ($scope && is_object($scope)) {
            $modelId = $scope->getKey();

            $s = static::where('key', $key)->where('scope_type', 'model')->where('scope_id', $modelId)->first();
            if ($s) {
                return static::castValue($s->value);
            }

            if (method_exists($scope, 'classify')) {
                $classifies = $scope->classify()->get();
                foreach ($classifies as $c) {
                    // subcategory
                    $s = static::where('key', $key)->where('scope_type', 'subcategory')->where('scope_id', $c->id)->first();
                    if ($s) {
                        return static::castValue($s->value);
                    }
                }
                foreach ($classifies as $c) {
                    // category
                    $s = static::where('key', $key)->where('scope_type', 'category')->where('scope_id', $c->id)->first();
                    if ($s) {
                        return static::castValue($s->value);
                    }
                }
            }
        }

        $s = static::where('key', $key)->whereNull('scope_type')->first();
        if ($s) {
            return static::castValue($s->value);
        }

        return null;
    }

    protected static function castValue($value)
    {
        if (is_null($value)) {
            return null;
        }
        if (is_string($value) && (json_decode($value) !== null)) {
            return json_decode($value, true);
        }
        if (is_string($value)) {
            $lower = strtolower($value);
            if ($lower === 'true') {
                return true;
            }
            if ($lower === 'false') {
                return false;
            }
        }
        if (is_numeric($value)) {
            if (strpos((string) $value, '.') !== false) {
                return (float) $value;
            }

            return (int) $value;
        }

        return $value;
    }

    public static function forGlobal($key)
    {
        return static::where('key', $key)->whereNull('scope_type')->first();
    }

    public static function forModel($key, $model)
    {
        return static::where('key', $key)->where('scope_type', 'model')->where('scope_id', $model->getKey())->first();
    }
}
