<?php

namespace Bites\Lms;

use Bites\Lms\Filament\Resources;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;




class LmsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // dump('LmsServiceProvider booted');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'bites');






    }
    public function register()
    {
        // dump('LmsServiceProvider registered');
        $existing = config('bites.model_namespaces', []);
        $additional = ['Bites\\Lms\\Models\\'];
        config([
            'bites.model_namespaces' => array_values(array_unique(array_merge($existing, $additional))),
        ]);

    }
}





























