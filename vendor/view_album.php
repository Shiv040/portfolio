<?php
session_start();
$vendor_id = $_SESSION['vendor_id'];
if (!isset($vendor_id)) {
    header("Location:login.php");
}
include('../conn.php');
$album_id = $_GET['album_id'];
$sql = "SELECT * FROM `vendor_wise_work_image` WHERE `album_id` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $album_id);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Vendor </title>
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
                        <li class="breadcrumb-item" aria-current="page">View Album </li>
                    </ol>
                    <!-- Breadcrumb ends -->

                </div>
                <!-- App Hero header ends -->

                <!-- App body starts -->
                <div class="app-body">
                    <!-- Row starts -->
                    <div class="row gx-3">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="col-sm-4 col-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="card-img">
                                        <img src="vendor_work/<?php echo $row['image_name']; ?>" class="img-fluid rounded-3 mb-3"
                                            alt="Image" />
                                    </div>
                                    <a href="#" class="btn btn-warning">Delete</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                       
                    </div>
                    <!-- Row ends -->
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