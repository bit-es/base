<?php
namespace Bites\Core\Policies;

use App\Models\User;

class BitesPolicy
{
    public function __call($method, $arguments)
    {
        [$user, $model] = $arguments;
        $name = 'can' . ucfirst($method);

        if (method_exists($model, $name)) {
            return $model->{$name}($user);
        }

        return false;
    }
}

