<?php

namespace Bites\Hrm\Commands;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class BitesRegisterProvider
{
    public static function addProvider()
    {
        ServiceProvider::addProviderToBootstrapFile(
            'Bites\\Hrm\\Providers\\HrmPanelProvider',
            App::getBootstrapProvidersPath()
        );
    }
}
