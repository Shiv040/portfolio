<?php
include '../conn.php';

// Get vendor ID from URL
$vendor_id = isset($_GET['id']) ? intval($_GET['id']) : 5;

// Fetch registered vendors with verification status 1
$sql = "SELECT * FROM vendor WHERE vender_id = $vendor_id";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin </title>
    <?php include "up_link.php"; ?>
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
            <?php include("app_header.php");?>
            <!-- App header ends -->

            <!-- App hero header starts -->
            <div class="app-hero-header d-flex align-items-center">

    <!-- Breadcrumb starts -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="bi bi-house lh-1 me-3"></i>
        </li>
    <li class="breadcrumb-item" aria-current="page"><?php //echo $msg;?>
    </ol>
    <!-- Breadcrumb ends -->

            </div>
            <!-- App Hero header ends -->

            <!-- App body starts -->
            <div class="app-body">
            <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title">Vendor Details</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Vendor Photo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['mobile_number'] . "</td>";
                        echo "<td>" . $row['address'] ."</td>";
                        $addhar = !empty($row['addhar_photo']) ? $row['addhar_photo'] : 'assets/images/avatar.png';
                        echo "<td><img src='" . $addhar . "' class='rounded-circle' width='40' ></td>";
                       echo "</tr>";
                }
                    } else {
                echo "<tr><td colspan='5'>No vendors found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
                </div>
            </div>
        </div>
                </div>
                
            </div>
            <!-- App body ends -->

            <!-- App footer starts -->
            <?php include("footer.php");?>
            <!-- App footer ends -->

        </div>
        <!-- App container ends -->

    </div>
    <!-- Main container ends -->

</div>
<!-- Page wrapper ends -->

<!-- *************
        ************ JavaScript Files *************
    ************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<?php include("down_link.php");?>
</body>
</html>
