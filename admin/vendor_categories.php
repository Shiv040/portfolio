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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVendorCategoryModal">
              Add New Vendor
            </button>


          </div>
          <!-- Breadcrumb ends -->



        </div>
        <!-- App Hero header ends -->

        <!-- App body starts -->
        <div class="app-body">
          <!-- Modal -->
          <div class="modal fade" id="addVendorCategoryModal" tabindex="-1" aria-labelledby="addVendorCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addVendorCategoryModalLabel">Add Vendor Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="insert_vendor_category.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="categoryName" class="form-label">Category Name</label>
                      <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                    <div class="mb-3">
                      <label for="categoryImage" class="form-label">Image</label>
                      <input type="file" class="form-control" id="categoryImage" name="categoryImage" required>
                    </div>
                    <div class="mb-3">
                      <label for="categoryDescription" class="form-label">Description</label>
                      <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Insert</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
            <?php foreach ($categories as $category) { ?>
              <div class="col-sm-4 col-12">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="card-img">
                      <img src="<?php echo $category['category_image']; ?>" class="img-fluid rounded-3 mb-3" alt="<?php echo $category['category_name']; ?>" />
                    </div>
                    <h5 class="mb-3"><?php echo $category['category_name']; ?></h5>
                    <p class="mb-3">
                      <?php echo $category['description']; ?>
                    </p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal" data-cat-id="<?php echo $category['category_id']; ?>">Add New Services</button>
                    <a href="edit_vendor_category.php?id=<?php echo $category['category_id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="delete_vendor_category.php?id=<?php echo $category['category_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- Add Service Modal -->
            <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addServiceModalLabel">Add Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="insert_service.php" method="POST">
                      <input type="hidden" name="categoryId" id="categoryId">
                      <div class="mb-3">
                        <label for="serviceName" class="form-label">Service Name</label>
                        <input type="text" class="form-control" id="serviceName" name="serviceName" required>
                      </div>
                      <div class="mb-3">
                        <label for="serviceDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="serviceDescription" name="serviceDescription" rows="3" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Insert</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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