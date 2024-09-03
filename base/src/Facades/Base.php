<?php

namespace Bites\Base\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bites\Base\Base
 */
class Base extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Bites\Base\Base::class;
    }
}
