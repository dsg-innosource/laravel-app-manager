<?php

return [
    'api_prefix' => env('LAM_API_PREFIX', ''),
    'packages' => [
        'laravel/framework',
        // 'spatie/laravel-ray',
        'dsginnosource/foreflow',
    ],

    // For each environment you want color coded enter the
    // class name from the Tailwind color palette

    'environment_colors' => [
        'local' => 'gray',
        'test' => 'blue',
        'staging' => 'indigo',
        'production' => 'red',
        'prod' => 'red',
    ],
];
