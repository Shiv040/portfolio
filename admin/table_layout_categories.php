<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin </title>
    <?php include 'up_link.php'; ?>

</head>

<body>

    <!-- Page wrapper starts -->
    <div class="page-wrapper">

        <!-- Main container starts -->
        <div class="main-container">

            <!-- Sidebar wrapper starts -->
            <nav id="sidebar" class="sidebar-wrapper">
                <?php include 'nav.php'; ?>
            </nav>
            <!-- Sidebar wrapper ends -->

            <!-- App container starts -->
            <div class="app-container">

                <!-- App header starts -->
                <?php include('app_header.php'); ?>
                <!-- App header ends -->

                <!-- App hero header starts -->
                <div class="app-hero-header d-flex align-items-center">

                    <!-- Breadcrumb starts -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <i class="bi bi-gear lh-1 me-3"></i>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Manage Vendor Categories</li>
                    </ol>
                    <div class="ms-auto">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addVendorCategoryModal">
                            Add New Categories
                        </button>
                        <a href="vendor_categories.php" class="btn btn-primary">
                            <i class="bi bi-grid"></i> Grid Layout
                        </a>

                    </div>
                    <!-- Breadcrumb ends -->



                </div>
                <!-- App Hero header ends -->

                <!-- App body starts -->
                <div class="app-body">
                    <!-- Modal -->
                    <div class="modal fade" id="addVendorCategoryModal" tabindex="-1"
                        aria-labelledby="addVendorCategoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addVendorCategoryModalLabel">Add Vendor Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="insert_vendor_category.php" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="categoryName" class="form-label">Category Name</label>
                                            <input type="text" class="form-control" id="categoryName"
                                                name="categoryName" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="categoryImage" class="form-label">Image</label>
                                            <input type="file" class="form-control" id="categoryImage"
                                                name="categoryImage" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="categoryDescription" class="form-label">Description</label>
                                            <textarea class="form-control" id="categoryDescription"
                                                name="categoryDescription" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Insert</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Close</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $json = file_get_contents('http://localhost/utsav_hub/api/list_vendors_categories.php');
                    $categories = json_decode($json, true);
                    ?>

                    <!-- Row starts -->
                    <div class="row gx-3">
                        <?php if ($categories) { ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Number of Vendor</th>
                                        <th>Description</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($categories as $category) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo htmlspecialchars($category['category_name']); ?></td>
                                            <td>
                                                
                                                <button data-bs-toggle="modal" data-bs-target="#viewMembersModal"
                                                    data-cat-id="<?php echo htmlspecialchars($category['category_id']); ?>">
                                                    <?php echo htmlspecialchars($category['vendor_count']); ?>
                                                </button>
                                                <!-- View Members Modal -->
                                                <div class="modal fade" id="viewMembersModal" tabindex="-1"
                                                    aria-labelledby="viewMembersModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="viewMembersModalLabel">View Members
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="membersList">
                                                                    <!-- Members list will be loaded here via AJAX -->
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td><?php echo htmlspecialchars($category['description']); ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Options
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><a class="dropdown-item"
                                                                href="edit_vendor_category.php?id=<?php echo htmlspecialchars($category['category_id']); ?>">Edit</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="delete_vendor_category.php?id=<?php echo htmlspecialchars($category['category_id']); ?>"
                                                                onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                                                        </li>
                                                        <li><a class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#addServiceModal"
                                                                data-cat-id="<?php echo htmlspecialchars($category['category_id']); ?>">Add
                                                                New Service</a></li>
                                                        <li><a class="dropdown-item"
                                                                href="view_service.php?cat_id=<?php echo htmlspecialchars($category['category_id']); ?>">View
                                                                Services</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <p>No categories found.</p>
                        <?php } ?>
                        <!-- Add Service Modal -->
                        <div class="modal fade" id="addServiceModal" tabindex="-1"
                            aria-labelledby="addServiceModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addServiceModalLabel">Add Service</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="insert_service.php" method="POST">
                                            <input type="hidden" name="categoryId" id="categoryId">
                                            <div class="mb-3">
                                                <label for="serviceName" class="form-label">Service Name</label>
                                                <input type="text" class="form-control" id="serviceName"
                                                    name="serviceName" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="serviceDescription" class="form-label">Description</label>
                                                <textarea class="form-control" id="serviceDescription"
                                                    name="serviceDescription" rows="3" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Insert</button>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row ends -->
                </div>
                <!-- App body ends -->

                <!-- App footer starts -->
                <?php include('footer.php'); ?>
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
    <?php include('down_link.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('#viewMembersModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var categoryId = button.data('cat-id');
            $.ajax({
                url: 'view_members.php',
                type: 'GET',
                data: { category_id: categoryId },
                success: function (response) {
                    $('#membersList').html(response);
                }
            });
        });
    </script>
    <script>
        $('#addServiceModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var categoryId = button.data('cat-id'); // Extract info from data-* attributes
            // alert(categoryId);
            $('#categoryId').val(categoryId);
        });
    </script>
</body>

</html>