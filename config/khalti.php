<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Khalti Payment Gateway Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration settings for the Khalti payment
    | gateway integration. You can modify these settings in your .env file.
    |
    */

    // Khalti API Keys
    'public_key' => env('KHALTI_PUBLIC_KEY', 'test_public_key_dc74e0fd57cb46cd93832aee0a390234'),
    'secret_key' => env('KHALTI_SECRET_KEY', 'test_secret_key_f59e8b7d18b4499ca40f68195a846e9b'),

    // Success and Failure URLs
    'success_url' => env('KHALTI_SUCCESS_URL', null),
    'failure_url' => env('KHALTI_FAILURE_URL', null),

    // Khalti API Endpoints
    'verify_url' => 'https://khalti.com/api/v2/payment/verify/',
    'lookup_url' => 'https://khalti.com/api/v2/payment/lookup/',
];