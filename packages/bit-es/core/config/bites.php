<?php

return [
    'model_namespaces' => [
        'App\\Models\\',
        'Bites\\Core\\Models\\',
        'Bites\\Core\\Models\\Csa\\',
        'Bites\\Dms\\Models\\',
        'Bites\\Erp\\Models\\',
        'Bites\\Eam\\Models\\',
        'Bites\\Hrm\\Models\\',
        'Bites\\Lms\\Models\\',
        'Bites\\Qas\\Models\\',
        'Bites\\Mes\\Models\\',
        'Spatie\\Permission\\Models\\',
    ],

    'person_models' => [
        \App\Models\User::class,
        // \Bites\Core\Models\Staff::class,
        \Bites\Core\Models\JobPosition::class,
    ],
    'asset_models' => [
        // \Bites\Core\Models\Asset::class,
    ],
];
