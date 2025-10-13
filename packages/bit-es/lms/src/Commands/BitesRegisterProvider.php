<?php

namespace Bites\Lms\Commands;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class BitesRegisterProvider
{
    public static function addProvider()
    {
        ServiceProvider::addProviderToBootstrapFile(
            'Bites\\Lms\\Providers\\LmsPanelProvider',
            App::getBootstrapProvidersPath()
        );
    }
}
