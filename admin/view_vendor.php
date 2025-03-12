<?php
include '../conn.php';

// Get vendor ID from URL
$vendor_id = isset($_GET['vender_id']) ? intval($_GET['vender_id']) : 5;

// Fetch registered vendors with verification status 1
$sql = "SELECT v.`vender_id`, `email`, `password`, `name`, v.`mobile_number`,b.mobile_number as mb, `category_id`, `address`, v.`area_id`, `profile_pic`, `verification_status`, `aadhar_photo`, `pancard_photo`, `created_at`, `varify_at`,logo
 FROM vendor v
 join business_info b 
 on b.vender_id=v.vender_id
    WHERE v.vender_id = $vendor_id";
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
                <?php include("app_header.php"); ?>
                <!-- App header ends -->

                <!-- App hero header starts -->
                <div class="app-hero-header d-flex align-items-center">

                    <!-- Breadcrumb starts -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <i class="bi bi-house lh-1 me-3"></i>
                        </li>
                        <li class="breadcrumb-item" aria-current="page"><?php //echo $msg; ?>
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
                                        <tbody>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $logo = '../vendor/logo_image/' . $row['logo'];
                                                    echo "<tr><th>Logo</th><td><img src='" . $logo . "' class='rounded-circle' width='100' ></td></tr>";
                                                    echo "<tr><th>Name</th><td>" . $row['name'] . "</td></tr>";
                                                    echo "<tr><th>Email</th><td>" . $row['email'] . "</td></tr>";
                                                    echo "<tr><th>Mobile Number</th><td>" . $row['mobile_number'] . "</td></tr>";
                                                    echo "<tr><th>Address</th><td>" . $row['address'] . "</td></tr>";
                                                    $aadhar = !empty($row['aadhar_photo']) ? '../vendor/aadhar_image/' . $row['aadhar_photo'] : 'assets/images/avatar.png';
                                                    echo "<tr><th>Aadhar Photo</th><td><img src='" . $aadhar . "' class='rounded-circle' width='100' ></td></tr>";
                                                    echo "<tr><th>Business Mobile Number</th><td>" . $row['mb'] . "</td></tr>";
                                                    echo "<tr><th>Pancard Photo</th><td><img src='" . $row['pancard_photo'] . "' class='rounded-circle' width='100' ></td></tr>";
                                                    echo "<tr><th>Created At</th><td>" . $row['created_at'] . "</td></tr>";
                                                    echo "<tr><th>Verified At</th><td>" . $row['varify_at'] . "</td></tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='2'>No vendors found</td></tr>";
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
                <?php include("footer.php"); ?>
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
    <?php include("down_link.php"); ?>
</body>

</html>