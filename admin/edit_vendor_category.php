<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin </title>
  <?php include 'up_link.php'; ?>
  
</head>

<?php
include '../conn.php';

// Get category_id from request
$category_id = $_GET['id'];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $category_name = $_POST['category_name'];
    $category_image = $_POST['category_image'];
    $description = $_POST['description'];

    // SQL to update a record
    $sql = "UPDATE vendor_categories SET category_name = ?, category_image = ?, description = ? WHERE category_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $category_name, $category_image, $description, $category_id);

    if ($stmt->execute()) {
        header("Location: vendor_categories.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

// SQL to select a record
$sql = "SELECT category_name, category_image, description FROM vendor_categories WHERE category_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $category_id);
$stmt->execute();
$stmt->bind_result($category_name, $category_image, $description);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

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

    <h2>Edit Vendor Category</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name:</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo htmlspecialchars($category_name); ?>">
        </div>
        <div class="mb-3">
            <label for="category_image" class="form-label">Category Image:</label>
            <input type="text" class="form-control" id="category_image" name="category_image" value="<?php echo htmlspecialchars($category_image); ?>">
            <?php if (!empty($category_image)): ?>
            <img src="<?php echo htmlspecialchars($category_image); ?>" alt="Category Image" class="img-thumbnail mt-2" style="max-width: 200px;">
            <?php endif; ?>
        </div><div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?php echo htmlspecialchars($description); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form></div>
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
  
</body>

</html>