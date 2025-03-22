<?php
header('Content-Type: application/json');

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Debug: If accessed directly via GET, show a message
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(['message' => 'This endpoint expects a POST request with JSON data.']);
    exit;
}

// Razorpay credentials
$key_id = 'rzp_test_AIurRjzMPH3oOR';
$key_secret = 'SZCqITB6HffCbtIXx8w2XWJI';

// Get the booking ID and amount from the request
$input = json_decode(file_get_contents('php://input'), true);
$booking_id = $input['bookingId'] ?? null;
$amount = floatval($input['amount'] ?? 0) * 100; // Convert to paise

if (!$booking_id || $amount <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid booking ID or amount']);
    exit;
}

try {
    $url = 'https://api.razorpay.com/v1/orders';
    $data = [
        'amount' => $amount, // Amount in paise
        'currency' => 'INR',
        'receipt' => "booking_{$booking_id}",
        'payment_capture' => 1 // Auto-capture payment
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "$key_id:$key_secret");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curl_error = curl_error($ch);
    curl_close($ch);

    if ($http_code !== 200) {
        throw new Exception('Failed to create Razorpay order: ' . ($curl_error ?: $response));
    }

    $order = json_decode($response, true);
    if (!$order || !isset($order['id'])) {
        throw new Exception('Invalid Razorpay response: ' . $response);
    }

    echo json_encode(['order_id' => $order['id']]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}