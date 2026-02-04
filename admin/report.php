<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin</title>
    <?php include "up_link.php"; ?>
    <style>
        .table-container {
            margin: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table thead th {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>

<body>

    <!-- Page wrapper starts -->
    <div class="page-wrapper">

        <!-- Main container starts -->
        <div class="main-container">

            <!-- Sidebar wrapper starts -->
            <nav id="sidebar" class="sidebar-wrapper">
                <?php include "nav.php"; ?>
            </nav>
            <!-- Sidebar wrapper ends -->

            <!-- App container starts -->
            <div class="app-container">

                <!-- App header starts -->
                <?php include("app_header.php"); ?>
                <!-- App header ends -->

                <!-- App hero header starts -->
                <div class="app-hero-header d-flex align-items-center">

                    <!-- Breadcrumb starts -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <i class="bi bi-house lh-1 me-3"></i>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Transaction Reports</li>
                    </ol>
                </div>

                <?php
                include '../conn.php';

                // Fetch data using join query with payment_status filter
                $query = "select * from payment p
                    join users u 
                    on p.user_id=u.user_id 
                    join inquiry i on p.user_id=i.user_id
                    join service s on s.service_id=i.service_id
                    WHERE i.status = 4";
                $result = $conn->query($query);

                if (!$result) {
                        die("Query failed: " . $conn->error);
                }
                if ($result->num_rows > 0) {
                        echo '<div class="table-container">';
                        echo '<div class="table-responsive">';
                        echo '<table class="table table-bordered table-striped">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>Date</th>';
                        echo '<th>Service Name</th>';
                        echo '<th>Amount</th>';
                        echo '<th>Username</th>';
                        echo '<th>Payment Status</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars(date("d-m-Y", strtotime($row['created_at']))) . '</td>';
                                echo '<td>' . htmlspecialchars($row['service_name']) . '</td>';
                                echo '<td>₹' . htmlspecialchars(number_format($row['amount'])) . '</td>';
                                echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['payment_method']) . '</td>';
                                echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>';
                        echo '</div>';
                } else {
                        echo '<div class="table-container">';
                        echo '<p class="text-danger">No completed payment records found.</p>';
                        echo '</div>';
                }
                ?>

            </div>
            <!-- App container ends -->

        </div>
        <!-- Main container ends -->

    </div>
    <!-- Page wrapper ends -->

</body>

</html>
