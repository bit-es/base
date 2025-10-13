<?php

namespace Bites\Hrm;

use Bites\Hrm\Filament\Resources;
use Illuminate\Support\ServiceProvider;

class HrmServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // dump('HrmServiceProvider booted');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bites');

    }

    public function register()
    {
        // dump('HrmServiceProvider registered');
        $existing = config('bites.model_namespaces', []);
        $additional = ['Bites\\Hrm\\Models\\'];
        config([
            'bites.model_namespaces' => array_values(array_unique(array_merge($existing, $additional))),
        ]);

    }
}
