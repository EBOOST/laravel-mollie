<?php

return [
    'testMode' => env('MOLLIE_TEST_MODE', false),

    'apiKeys' => [
        'test' => env('MOLLIE_TEST_KEY', ''),
        'live' => env('MOLLIE_LIVE_KEY', '')
    ],
];
