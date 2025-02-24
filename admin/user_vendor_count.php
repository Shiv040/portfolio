<?php
include '../conn.php'; // Assuming conn.php handles connection errors

// Count users
$user_count_sql = "SELECT COUNT(*) as user_count FROM users";
$user_result = $conn->query($user_count_sql);
if ($user_result) {
    $user_count = $user_result->fetch_assoc()['user_count'];
} else {
    $user_count = 0;
    // Optionally, log or display error here
}

// Count vendors
$vendor_count_sql = "SELECT COUNT(*) as vendor_count FROM vendor";
$vendor_result = $conn->query($vendor_count_sql);
if ($vendor_result) {
    $vendor_count = $vendor_result->fetch_assoc()['vendor_count'];
} else {
    $vendor_count = 0;
    // Optionally, log or display error here
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> <!-- Google Font -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f7f8fa;
            padding: 30px;
        }
        .dashboard {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
            background-color: white;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            color: #333;
            text-align: center;
            font-size: 36px;
            margin-bottom: 50px;
        }
        .count-box {
            display: inline-block;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            width: 250px;
            text-align: center;
        }
        .count-box h2 {
            font-size: 30px;
            color: #333;
            font-weight: 500;
        }
        .count-box .icon {
            font-size: 40px;
            color: #007bff;
            margin-bottom: 10px;
        }
        .row {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
        .btn-back {
            background-color: #6c757d;
            color: white;
            padding: 10px 30px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 30px;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="row">
            <div class="count-box">
                <div class="icon">
                    <i class="bi bi-users"></i>
                </div>
                <h2>Users: <?php echo $user_count; ?></h2>
            </div>
            <div class="count-box">
                <div class="icon">
                    <i class="bi bi-store"></i>
                </div>
                <h2>Vendors: <?php echo $vendor_count; ?></h2>
            </div>
        </div>
        
    </div>

    <!-- Include Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
