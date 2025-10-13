<?php

namespace Bites\Core\Policies;

class BitesPolicy
{
    public function __call($method, $arguments)
    {
        [$user, $model] = $arguments;
        $name = 'can'.ucfirst($method);

        if (method_exists($model, $name)) {
            return $model->{$name}($user);
        }

        return false;
    }
}
