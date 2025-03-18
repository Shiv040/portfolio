<?php
session_start();
$vendor_id = $_SESSION['vendor_id'];
if (!isset($vendor_id)) {
    header("Location:login.php");
}
include('../conn.php');
$query = "SELECT *, s.service_id as sid
FROM service s
JOIN vendor v ON s.category_id = v.category_id
WHERE v.vender_id = '$vendor_id'";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Vendor Manage Service </title>
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
                        <li class="breadcrumb-item" aria-current="page">Manage Service</li>
                    </ol>
                    <!-- Breadcrumb ends -->

                </div>
                <!-- App Hero header ends -->

                <!-- App body starts -->
                <div class="app-body">
                    <!-- Row starts -->
                    <div class="row gx-3">
                        <div class="col-12">
                            <form action="add_service.php" method="post" enctype="multipart/form-data">
                                <div class="table-outer mb-4">
                                    <div class="table-responsive">
                                        <table class="table truncate align-middle m-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Service Name</th>
                                                    <th width="20%">Price</th>
                                                    <th>Policy</th>
                                                    <th>Cover Image</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = mysqli_query($conn, $query);
                                                $i = 1;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $service_id = $row['sid'];
                                                    $q2 = "SELECT * 
                                                    FROM `vendor_wise_services` 
                                                    WHERE `service_id`=$service_id and `vender_id`=$vendor_id";
                                                    $r2 = mysqli_query($conn, $q2);
                                                    $row2 = mysqli_fetch_assoc($r2);
                                                    if ($row2 == null) {
                                                        $price = 0;
                                                        $status = 0;
                                                        $cover_image = "";
                                                    } else {
                                                        $cover_image = $row2['cover_image'];
                                                        $price = $row2['price'];
                                                        $status = $row2['status'];
                                                    }

                                                ?>
                                                    <tr>
                                                        <input type="hidden" value="<?php echo $service_id; ?>" name="service_id[]" />
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['service_name']; ?></td>

                                                        <td>
                                                            <div class="input-group m-0">
                                                                <span class="input-group-text">
                                                                    <i class="bi bi-currency-rupee"></i>
                                                                </span>
                                                                <input type="text" class="form-control" value="<?php echo $price; ?>" name="price[]" />
                                                            </div>

                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <?php
                                                            if ($cover_image == "" || $cover_image=="cover_image/no.jpg") {
                                                            ?>
                                                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#imageModal<?php echo $service_id; ?>">
                                                                    Add Image
                                                                </button>

                                                                <!-- Image Modal -->

                                                                <div class="modal fade" id="imageModal<?php echo $service_id; ?>" tabindex="-1" aria-labelledby="imageModalLabel<?php echo $service_id; ?>" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="imageModalLabel<?php echo $service_id; ?>">Add Cover Image</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-header">
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <input type="file" class="form-control" name="cover_image<?php echo $service_id; ?>" accept="image/*">
                                                                            </div>
                                                                            <div class="modal-footer">

                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary" name="btnAddService">Add Service</button>
                                                                                <button type="submit" class="btn btn-primary" name="btnAddImage">Add Cover Image</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                            else{
                                                            ?>
                                                                <img src="<?php echo $cover_image; ?>" alt="cover image" width="100" height="100" />
                                                            <?php    
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <div class="form-check form-switch m-0">
                                                                <input class="form-check-input" type="checkbox" id="chk<?php echo $service_id; ?>" role="switch" name="status<?php echo $service_id; ?>" value="1" <?php if ($status == 1) echo "checked"; ?> />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Buttons starts -->
                                <div class="d-flex gap-2 justify-content-end">
                                    <button type="button" class="btn btn-outline-primary" onclick="location.reload();">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary" name="btnU">
                                        Update
                                    </button>
                                </div>
                                <!-- Buttons ends -->
                            </form>
                        </div>
                    </div>

                <!-- App footer starts -->
                <?php include("footer.php"); ?>
                <!-- App footer ends -->

                    <!-- Row ends -->
                </div>
                <!-- App body ends -->
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