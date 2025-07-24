# eSewa Payment Integration for FUTBOOK

This document provides instructions for setting up and using the eSewa payment gateway integration for court bookings in the FUTBOOK application.

## Overview

The integration allows users to pay for court bookings using eSewa, a popular digital wallet in Nepal. After selecting a court and filling in booking details, users are redirected to the eSewa payment gateway to complete their payment.

## Features

- Seamless redirection to eSewa payment gateway
- Dynamic payment amount based on court booking fee
- Success and failure handling with appropriate messages
- Payment status tracking in the database
- Sandbox/test environment support for development and testing

## Setup Instructions

### 1. Run Migrations

Run the following command to create the necessary database tables and columns:

```bash
php artisan migrate
```

This will add the following fields to the `bookings` table:
- `payment_method`
- `payment_id`
- `payment_status`
- `payment_response`

It will also add a `price` field to the `venues` table if it doesn't already exist.

### 2. Update Venue Prices

Run the venue price seeder to ensure all venues have a price:

```bash
php artisan db:seed --class=Database\Seeders\VenuePriceSeeder
```

### 3. Quick Setup (Alternative)

Alternatively, you can run the setup command which will perform both steps above:

```bash
php artisan setup:esewa
```

## Configuration

The eSewa integration is configured to use the sandbox/test environment by default. To switch to the production environment, update the following in `app/Http/Controllers/EsewaPaymentController.php`:

```php
// Change from sandbox URL
protected $esewaUrl = 'https://uat.esewa.com.np/epay/main';
protected $merchantCode = 'EPAYTEST';

// To production URL
protected $esewaUrl = 'https://esewa.com.np/epay/main';
protected $merchantCode = 'YOUR_MERCHANT_CODE'; // Replace with your actual merchant code
```

## How It Works

1. User selects a court and fills in booking details
2. User clicks "Book Court" button
3. System creates a booking record with "pending" status
4. User is redirected to eSewa payment gateway
5. User completes payment on eSewa
6. eSewa redirects back to the success or failure URL
7. System updates booking status based on payment result

## Testing

To test the integration:

1. Create a booking through the frontend
2. You will be redirected to the eSewa sandbox
3. Use the following test credentials:
   - eSewa ID: 9806800001/2/3/4/5
   - Password: Nepal@123
   - Token: 123456

## Troubleshooting

- If payment is not working, check the Laravel logs at `storage/logs/laravel.log`
- Ensure your server is accessible from the internet for eSewa to send callbacks
- Verify that the success and failure URLs are correctly configured

## Support

For any issues or questions regarding the eSewa integration, please contact the development team.