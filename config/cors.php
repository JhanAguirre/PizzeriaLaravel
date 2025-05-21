<?php

    return [

        /*
        |--------------------------------------------------------------------------
        | Cross-Origin Resource Sharing (CORS) Configuration
        |--------------------------------------------------------------------------
        |
        | Here you may configure your settings for cross-origin resource sharing
        | or "CORS". This determines which cross-origin requests may execute
        | JS safely in a browser. You are free to adjust these settings as
        | needed.
        |
        | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
        |
        */

        'paths' => ['api/*', 'sanctum/csrf-cookie'],

        'allowed_methods' => ['*'], // Permite todos los métodos (GET, POST, PUT, DELETE, etc.)

        'allowed_origins' => ['http://localhost:8080', 'http://127.0.0.1:8080'], // Permite peticiones desde tu frontend Vue.js

        'allowed_origins_patterns' => [],

        'allowed_headers' => ['*'], // Permite todos los encabezados en las peticiones

        'exposed_headers' => [],

        'max_age' => 0,

        'supports_credentials' => false,

    ];