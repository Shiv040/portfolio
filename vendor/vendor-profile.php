<?php
// vendor-profile.php

include('../conn.php');
session_start();
$vendor_id = $_SESSION['vender_id'];

// Ensure $vender_id is defined and has a valid value

$sql = "SELECT name, email, mobile_number, address FROM vendor WHERE vender_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $vendor_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the vendor exists
if ($vendor = $result->fetch_assoc()) {
    // Vendor data fetched successfully
    $vendor_name = htmlspecialchars($vendor['name']);
    $vendor_email = htmlspecialchars($vendor['email']);
    $vendor_phone = htmlspecialchars($vendor['mobile_number']);
    // Assuming address is also a field in the vendor table
    $vendor_address = htmlspecialchars($vendor['address']);
} else {
    echo "
    <div class='container mt-5'>
        <div class='alert alert-danger d-flex align-items-center text-center' role='alert'>
            <i class='bi bi-exclamation-circle-fill me-3' style='font-size: 1.5rem;'></i>
            <div>
                <strong>Error!</strong> Vendor not found.
            </div>
        </div>
    </div>";
    exit();
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            border-radius: 0;
        }
        .btn {
            border-radius: 0;
        }
    </style>
</head>
<body>
    <div class="container" style="width: 50%; height: auto;">
        <div class="card">
            <div class="card-header text-center">
                <h2>Vendor Profile</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="vendor_name">Name</label>
                        <input type="text" class="form-control" id="vendor_name" name="name" value="<?php echo $vendor_name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_email">Email:</label>
                        <input type="email" class="form-control" id="vendor_email" name="email" value="<?php echo $vendor_email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_phone">Phone:</label>
                        <input type="text" class="form-control" id="vendor_phone" name="mobile_number" value="<?php echo $vendor_phone; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="vendor_address">Address:</label>
                        <input type="text" class="form-control" id="vendor_address" name="address" value="<?php echo $vendor_address; ?>" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>