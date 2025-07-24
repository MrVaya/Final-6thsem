<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Complete Your Payment - Khalti</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Khalti Checkout JS -->
    <script src="https://khalti.com/static/khalti-checkout.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <i class="fas fa-futbol text-4xl text-green-600 mb-4"></i>
                <h2 class="text-3xl font-extrabold text-gray-900">Complete Your Payment</h2>
                <p class="mt-2 text-sm text-gray-600">Secure payment with Khalti</p>
            </div>

            <!-- Booking Details Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Booking Details</h3>
                
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Court:</span>
                        <span class="font-medium">{{ $booking->venue->venuename ?? 'Futsal Court' }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Customer:</span>
                        <span class="font-medium">{{ $booking->customer_name }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Date:</span>
                        <span class="font-medium">{{ \Carbon\Carbon::parse($booking->booking_date)->format('M d, Y') }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-600">Time:</span>
                        <span class="font-medium">{{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}</span>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="flex justify-between text-lg font-semibold">
                        <span>Total Amount:</span>
                        <span class="text-green-600">NPR {{ number_format($booking->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Payment Button -->
            <div class="text-center">
                <button id="payment-button" 
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">
                    <i class="fas fa-credit-card mr-2"></i>
                    Pay with Khalti - NPR {{ number_format($booking->total_amount, 2) }}
                </button>
                
                <p class="mt-3 text-xs text-gray-500">
                    <i class="fas fa-shield-alt mr-1"></i>
                    Secure payment powered by Khalti
                </p>
            </div>

            <!-- Back Button -->
            <div class="text-center">
                <a href="{{ route('frontend.home') }}" 
                   class="inline-flex items-center text-sm text-gray-600 hover:text-gray-900">
                    <i class="fas fa-arrow-left mr-1"></i>
                    Back to Home
                </a>
            </div>
        </div>
    </div>

    <!-- Loading Modal -->
    <div id="loading-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-purple-600 mx-auto"></div>
                <h3 class="text-lg font-medium text-gray-900 mt-4">Processing Payment...</h3>
                <p class="text-sm text-gray-500 mt-2">Please wait while we verify your payment</p>
            </div>
        </div>
    </div>

    <script>
        // Khalti Configuration
        var config = {
            publicKey: "{{ $paymentConfig['publicKey'] }}",
            productIdentity: "{{ $paymentConfig['productIdentity'] }}",
            productName: "{{ $paymentConfig['productName'] }}",
            productUrl: "{{ $paymentConfig['productUrl'] }}",
            eventHandler: {
                onSuccess: function (payload) {
                    console.log('Khalti Payment Success:', payload);
                    
                    // Show loading modal
                    document.getElementById('loading-modal').classList.remove('hidden');
                    
                    // Send token to server for verification
                    fetch('{{ route("khalti.verify") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify({
                            token: payload.token,
                            amount: payload.amount,
                            booking_id: {{ $booking->id }}
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Verification Response:', data);
                        
                        // Hide loading modal
                        document.getElementById('loading-modal').classList.add('hidden');
                        
                        if (data.success) {
                            // Redirect to success page
                            window.location.href = data.redirect_url;
                        } else {
                            // Show error and redirect to failure page
                            alert('Payment verification failed: ' + data.message);
                            if (data.redirect_url) {
                                window.location.href = data.redirect_url;
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        
                        // Hide loading modal
                        document.getElementById('loading-modal').classList.add('hidden');
                        
                        alert('Error processing payment verification. Please contact support.');
                    });
                },
                
                onError: function (error) {
                    console.log('Khalti Payment Error:', error);
                    alert('Payment failed: ' + (error.message || 'Unknown error occurred'));
                },
                
                onClose: function () {
                    console.log('Khalti widget is closing');
                }
            }
        };

        // Initialize Khalti Checkout
        var checkout = new KhaltiCheckout(config);

        // Payment button click handler
        document.getElementById("payment-button").onclick = function () {
            checkout.show({
                amount: {{ $paymentConfig['amount'] }} // Amount in paisa
            });
        };

        // Auto-trigger payment on page load (optional)
        // Uncomment the line below to auto-open payment popup
        // setTimeout(() => checkout.show({amount: {{ $paymentConfig['amount'] }}}), 1000);
    </script>
</body>
</html>