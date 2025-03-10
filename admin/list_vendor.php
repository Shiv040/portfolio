<?php
include '../conn.php';
// Fetch all vendors

if (isset($_GET['status'])) {
  $status = $_GET['status'];
  $sql = "SELECT b.logo, b.business_name, v.vender_id, b.location, v.name, v.email, t.category_name, v.verification_status
  FROM vendor v
  JOIN vendor_categories t ON v.category_id = t.category_id
  JOIN business_info b ON b.vender_id = v.vender_id
  WHERE v.verification_status = $status";
  $result = $conn->query($sql);
} else {
  echo "Please provide a valid status to filter the vendors.";
  exit;
}

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
  <li class="breadcrumb-item" aria-current="page"><?php echo "List Vendors";?>
  </ol>
  <!-- Breadcrumb ends -->

    </div>
    <!-- App Hero header ends -->

    <!-- App body starts -->
    <div class="app-body">
    <div class="col-sm-12">
  <div class="card mb-3">
    <div class="card-header">
    <h5 class="card-title">Default</h5>
    </div>
    <div class="card-body">
    <div class="table-outer">
      <div class="table-responsive">
    <table class="table align-middle table-hover m-0 truncate">
    <thead>
      <tr>
      <th scope="col">Logo</th>
      <th scope="col">Business Name</th>
      <th scope="col">Location</th>
      <th scope="col">Vendor Name</th>
      <th scope="col">Vendor Email</th>
      <th scope="col">Category</th>
      <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      $logo = '../vendor/logo_image/' . $row['logo'];
      echo "<td><img src='" . $logo . "' class='rounded-circle' width='40'></td>";
      echo "<td>" . $row['business_name'] . "</td>";
      echo "<td>" . $row['location'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
      echo "<td>" . $row['category_name'] . "</td>";
      echo "<td><a href='view_vendor.php?id=" . $row['vender_id'] . "' class='btn btn-success btn-lg bi-eye'></a></td>";
      if ($status != 2) {
        echo "<td><a href='reject_vendor.php?id=" . $row['vender_id'] . "' class='btn btn-danger btn-lg bi-x-circle'>Reject</a></td>";
      }
      if ($status != 1) {
      echo "<td><a href='accept_vendor.php?id=" . $row['vender_id'] . "' class='btn btn-success btn-lg bi-check-circle'>Accept</a></td>";
      }
      echo "</tr>";
    }
    }
       else {
    echo "<tr><td colspan='7'>No vendors found</td></tr>";
      }
      ?>
    </tbody>
    </table>
      </div>
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
