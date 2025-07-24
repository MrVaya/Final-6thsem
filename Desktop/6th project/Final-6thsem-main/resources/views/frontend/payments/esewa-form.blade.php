<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting to eSewa Payment</title>
    <link href="{{ asset('backend-assets/vendor/css/core.css') }}" rel="stylesheet" />
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f5f5f9;
        }
        .payment-container {
            text-align: center;
            padding: 2rem;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
        }
        .logo {
            margin-bottom: 1.5rem;
        }
        .spinner {
            margin: 1.5rem auto;
            width: 50px;
            height: 50px;
            border: 3px solid rgba(0,0,0,0.1);
            border-radius: 50%;
            border-top-color: #696cff;
            animation: spin 1s ease-in-out infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <div class="logo">
            <img src="{{ asset('frontend-assets/images/logo.png') }}" alt="FUTBOOK" height="40">
        </div>
        <h3>Redirecting to eSewa Payment</h3>
        <p>Please wait while we redirect you to the eSewa payment gateway...</p>
        <div class="spinner"></div>
        <p class="text-muted">Amount: Rs. {{ number_format($params['tAmt'], 2) }}</p>
        
        <!-- eSewa Form -->
        <form action="{{ $esewaUrl }}" method="POST" id="esewa-payment-form">
            <input value="{{ $params['tAmt'] }}" name="tAmt" type="hidden">
            <input value="{{ $params['amt'] }}" name="amt" type="hidden">
            <input value="{{ $params['txAmt'] }}" name="txAmt" type="hidden">
            <input value="{{ $params['psc'] }}" name="psc" type="hidden">
            <input value="{{ $params['pdc'] }}" name="pdc" type="hidden">
            <input value="{{ $params['scd'] }}" name="scd" type="hidden">
            <input value="{{ $params['pid'] }}" name="pid" type="hidden">
            <input value="{{ $params['su'] }}" type="hidden" name="su">
            <input value="{{ $params['fu'] }}" type="hidden" name="fu">
            <button type="submit" class="btn btn-primary" id="manual-submit" style="display: none;">Proceed to eSewa</button>
        </form>
        <p class="mt-3">If you are not redirected automatically, <a href="#" onclick="document.getElementById('manual-submit').click(); return false;">click here</a>.</p>
    </div>

    <script>
        // Auto-submit the form after a short delay
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.getElementById('esewa-payment-form').submit();
            }, 2000);
        });
    </script>
</body>
</html>