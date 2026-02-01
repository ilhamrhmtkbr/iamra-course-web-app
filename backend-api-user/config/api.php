<?php

return [
    'version' => env('USER_API_VERSION', 'v1'),
    'google' => [
        'api_key' => env('GOOGLE_API_KEY'),
        'project_id' => env('GOOGLE_PROJECT_ID'),
        'recaptcha_v2_secret_key' => env('GOOGLE_RECAPTCHA_V2_SECRET_KEY'),
        'recaptcha_enterprise_site_key' => env('GOOGLE_RECAPTCHA_ENTERPRISE_SITE_KEY')
    ]
];
