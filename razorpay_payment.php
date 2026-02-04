<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
include('conn.php');
$query = "UPDATE inquiry SET status = 4 WHERE user_id = $user_id";
mysqli_query($conn, $query);
$booking_id = rand(100000, 999999); // Generate random 6-digit booking ID
$amount = 0; // Replace with actual amount if available
$payment_method = 'Online';
$status = 1; // Payment successful
$transaction_id = uniqid(); // Generate a unique transaction ID
$created_at = date('Y-m-d H:i:s'); // Current timestamp

$query = "INSERT INTO payment (payment_id, booking_id, user_id, amount, payment_method, status, transaction_id, created_at) 
          VALUES (NULL, '$booking_id', '$user_id', '$amount', '$payment_method', '$status', '$transaction_id', '$created_at')";
mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        Payment Successful
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Thank you for your payment!</h5>
                        <p class="card-text">Your transaction has been completed successfully.</p>
                        <a href="bill.php" class="btn btn-primary">Generate Bill</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>