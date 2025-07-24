<?php

return [
    /*
    |--------------------------------------------------------------------------
    | eSewa Payment Gateway Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration settings for the eSewa payment
    | gateway integration. You can modify these settings in your .env file.
    |
    */

    // eSewa API URL (sandbox or production)
    'url' => env('ESEWA_URL', 'https://uat.esewa.com.np/epay/main'),

    // eSewa Merchant Code
    'merchant_code' => env('ESEWA_MERCHANT_CODE', 'EPAYTEST'),

    // Success and Failure URLs
    'success_url' => env('ESEWA_SUCCESS_URL', null),
    'failure_url' => env('ESEWA_FAILURE_URL', null),

    // Service Tax and Delivery Charge (default to 0)
    'service_charge' => env('ESEWA_SERVICE_CHARGE', 0),
    'delivery_charge' => env('ESEWA_DELIVERY_CHARGE', 0),
];