<?php
session_start();
$vendor_id = $_SESSION['vendor_id'];
if (!isset($vendor_id)) {
    header("Location:login.php");
}
include('../conn.php');
$query = "SELECT * 
FROM service s 
left join vendor_wise_services vs 
on s.service_id=vs.service_id
WHERE category_id=(SELECT `category_id`
                FROM `vendor`
                WHERE `vender_id`='$vendor_id')";

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
                            <form action="add_service.php" method="post">
                            <div class="table-outer mb-4">
                                <div class="table-responsive">
                                    <table class="table truncate align-middle m-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Service Name</th>
                                                <th width="20%">Price</th>
                                                <th>Policy</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $result = mysqli_query($conn, $query);
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $service_id = $row['service_id'];
                                                $price = $row['price'];
                                                $status = $row['status'];   
                                               
                                            ?>
                                                <tr>
                                                    <input type="hidden" value="<?php echo $service_id;?>" name="service_id[]" />
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row['service_name']; ?></td>
                                                    <td>
                                                        <div class="input-group m-0">
                                                        <span class="input-group-text">
                                                                <i class="bi bi-currency-rupee"></i>
                                                            </span>
                                                            <input type="text" class="form-control" value="<?php echo $price;?>" name="price[]" />                                                           
                                                        </div>

                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <div class="form-check form-switch m-0">
                                                            <input class="form-check-input" type="checkbox" id="chk<?php echo $service_id;?>" role="switch" name="status<?php echo $service_id;?>" value="1" <?php if($status==1) echo "checked";?>/>
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