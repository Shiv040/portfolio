<?php
session_start();
$vendor_id = $_SESSION['vendor_id'];
if (!isset($vendor_id)) {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manage Album </title>
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
                        <li class="breadcrumb-item" aria-current="page">Manage Photos/Videos</li>
                    </ol>
                    <!-- Breadcrumb ends -->

                </div>
                <!-- App Hero header ends -->
                <!-- App action header starts -->
               
                <!-- App action header ends -->
                <!-- App body starts -->
                <div class="app-body">
                <div class="app-action-header d-flex align-items-center justify-content-between mb-4">
                    <h1 class="page-title mb-0"></h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAlbumModal">
                        Add New Album
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addAlbumModal" tabindex="-1" aria-labelledby="addAlbumModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addAlbumModalLabel">Add New Album</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="addAlbumForm" action="add_album.php" method="post">
                                    <div class="mb-3">
                                        <label for="albumName" class="form-label">Album Name</label>
                                        <input type="text" class="form-control" id="albumName" name="album_name" required>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" form="addAlbumForm">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row gx-3">
                        <div class="col-12">

                            <div class="table-outer mb-4">
                                <div class="table-responsive">
                                    <table class="table truncate align-middle m-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Album Name</th>
                                                <th>Total Photos</th>
                                                <th>Total Videos</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM `vendor_work_album`
                                            WHERE `vender_id` = $vendor_id";
                                            $result = mysqli_query($conn, $query);
                                            $i = 1;
                                            while ($row1 = mysqli_fetch_assoc($result)) {
                                                $album_id = $row1['album_id'];
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $row1['album_name']; ?></td>
                                                <?php
                                                $query1 = "SELECT * FROM `vendor_wise_work_image`
                                                WHERE `album_id` = $album_id";
                                                $result1 = mysqli_query($conn, $query1);
                                                $total_images = mysqli_num_rows($result1);
                                                ?>
                                                <td><?php echo $total_images;?></td>
                                                <?php
                                                $query1 = "SELECT * FROM `vendor_wise_work_video`
                                                WHERE `album_id` = $album_id";
                                                $result1 = mysqli_query($conn, $query1);
                                                $total_video = mysqli_num_rows($result1);
                                                ?>
                                                <td><?php echo $total_video;?></td>
                                                <td>
                                                    <div class="dropdown">
                                                    <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#addImageModal<?php echo $album_id; ?>">Add Image</button>
                                                    <button class="btn btn-sm btn-info">Add Video</button>
                                                        <button class="btn btn-sm btn-primary">View Album</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                                $i++;
                                            }   
                                            ?>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Row ends -->
                    <?php
                    $result = mysqli_query($conn, $query);
                    while ($row1 = mysqli_fetch_assoc($result)) {
                        $album_id = $row1['album_id'];
                    ?>
                    <!-- Add Image Modal -->
                    <div class="modal fade" id="addImageModal<?php echo $album_id; ?>" tabindex="-1" aria-labelledby="addImageModalLabel<?php echo $album_id; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addImageModalLabel<?php echo $album_id; ?>">Add Image to <?php echo $row1['album_name']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addImageForm<?php echo $album_id; ?>" action="add_image.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="album_id" value="<?php echo $album_id; ?>">
                                        <div class="mb-3">
                                            <label for="imageFile<?php echo $album_id; ?>" class="form-label">Select Image</label>
                                            <input type="file" class="form-control" id="imageFile<?php echo $album_id; ?>" name="image_file" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" form="addImageForm<?php echo $album_id; ?>">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
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