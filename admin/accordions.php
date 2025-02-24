<?php
// Database connection
include '../conn.php';

// Fetch registered vendors
$sql = "SELECT b.business_id,v.vender_id, v.name,b.business_name  FROM business_info b 
        JOIN tbl_vendor_wise_business t ON b.business_id = t.business_id 
        JOIN vendor v ON v.vender_id = t.vender_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Vendors</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
        }
        .container {
            max-width: 900px;
        }
        .card-header {
            background-color: black;
            color: #fff;
        }
        .card-header:hover {
            background-color: silver;
        }
        .card-body {
            background-color: #fff;
        }
        .card {
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .btn-link {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }
        .btn-link:hover {
            text-decoration: underline;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            font-size: 16px;
            padding: 10px 20px;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .text-center {
            margin-top: 20px;
        }
        .table th, .table td {
            padding: 15px;
            text-align: left;
        }
        .table-bordered {
            border: 1px solid #ddd;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Registered Vendors</h2>
    <div id="accordion">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="card">
                    <div class="card-header" id="heading<?= $row['vender_id'] ?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $row['vender_id'] ?>" aria-expanded="true" aria-controls="collapse<?= $row['vender_id'] ?>">
                                <?= htmlspecialchars($row['name']) ?> - <?= htmlspecialchars($row['business_name']) ?>
                            </button>
                        </h5>
                    </div>

                    <div id="collapse<?= $row['vender_id'] ?>" class="collapse" aria-labelledby="heading<?= $row['vender_id'] ?>" data-parent="#accordion">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Business Name</th>
                                            <th>Vendor Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= htmlspecialchars($row['business_name']) ?></td>
                                            <td><?= htmlspecialchars($row['name']) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- View Vendor Details Button -->
                            <div class="text-center">
                                <a href="vendor_details.php?vendor_id=<?= $row['business_id'] ?>" class="btn btn-primary">View Vendor Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<div class='alert alert-warning text-center' role='alert'>No registered vendors found.</div>";
        }
        $conn->close();
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
