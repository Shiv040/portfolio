<?php
// Database connection
include '../conn.php';

// Get vendor_id from URL
$vendor_id = $_GET['vendor_id'];

// Fetch vendor details
$sql = "SELECT vender_id, email, mobile_number, address FROM vendor WHERE vender_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $vendor_id);
$stmt->execute();
$result = $stmt->get_result();
$vendor = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
        }
        .container {
            max-width: 900px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .table th, .table td {
            padding: 15px;
            text-align: left;
        }
        .table-bordered {
            border: 1px solid #ddd;
            margin-top: 20px;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            padding: 10px 20px;
            font-size: 16px;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .card {
            margin-bottom: 20px;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Vendor Details</h2>
    <?php if ($vendor): ?>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Vendor ID</th>
                        <td><?= htmlspecialchars($vendor['vender_id']) ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= htmlspecialchars($vendor['email']) ?></td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th>
                        <td><?= htmlspecialchars($vendor['mobile_number']) ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?= htmlspecialchars($vendor['address']) ?></td>
                    </tr>
                </table>
                <div class="back-link">
                    <a href="accordions.php" class="btn btn-secondary">Back to Vendors List</a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p class="text-center">No details found for this vendor.</p>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
