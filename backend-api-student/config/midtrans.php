<?php

return [
    'base_url' => env('MIDTRANS_URL'),
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),

    // Optional: merchant settings
    'merchant_id' => env('MIDTRANS_MERCHANT_ID'),

    // Optional: notification settings
    'sanitized' => env('MIDTRANS_SANITIZED', true),
    '3ds' => env('MIDTRANS_3DS', true),
];
