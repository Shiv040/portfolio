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
            <li class="breadcrumb-item" aria-current="page">Admin Dashboard</li>
          </ol>
          <!-- Breadcrumb ends -->
        </div>

        <!-- App Hero header ends -->
        <div class="row gx-3 my-3 p-3 justify-content-center">
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="bg-warning-subtle mb-3 rounded">
              <div class="sales-card p-2">
                <div class="sales-thumbs">
                  <img src="assets/images/card-thumbs/thumb1.jpg" class="thumb1" alt="Bootstrap Gallery">
                  <img src="assets/images/card-thumbs/thumb2.jpg" class="thumb2" alt="Bootstrap Gallery">
                  <img src="assets/images/card-thumbs/thumb3.jpg" class="thumb3" alt="Bootstrap Gallery">
                </div>
                <div class="ms-2">
                <?php
                    $user_count_sql = "SELECT COUNT(*) as user_count FROM users";
                    $user_result = $conn->query($user_count_sql);
                    if ($user_result) {
                        $user_count = $user_result->fetch_assoc()['user_count'];
                    } else {
                        $user_count = 0;
                         // Optionally, log or display error here
                    }
                ?>
                  <h2 class="m-0 fw-bold text-black"><?php echo $user_count;?></h2>
                  <h5 class="m-0 fw-bold text-black">Users</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="bg-success-subtle mb-3 rounded">
              <div class="sales-card p-2">
                <div class="sales-thumbs">
                  <img src="assets/images/card-thumbs/thumb3.jpg" class="thumb1" alt="Bootstrap Gallery">
                  <img src="assets/images/card-thumbs/thumb2.jpg" class="thumb2" alt="Bootstrap Gallery">
                  <img src="assets/images/card-thumbs/thumb1.jpg" class="thumb3" alt="Bootstrap Gallery">
                </div>
                <div class="ms-2">
                  <?php
                  $vendor_count_sql = "SELECT COUNT(*) as vendor_count FROM vendor";
                  $vendor_result = $conn->query($vendor_count_sql);
                  if ($vendor_result) {
                        $vendor_count = $vendor_result->fetch_assoc()['vendor_count'];
                  } else {
                  $vendor_count = 0;
                       // Optionally, log or display error here
                  }
                  ?>
                  <h2 class="m-0 fw-bold text-black"><?php echo $vendor_count;?></h2>
                  <h5 class="m-0 fw-bold text-black">Vendors</h5>
                  </div>
              </div>
            </div>
          </div>
          
          
          </div>
        </div>
        <!-- App container ends -->
      </div>
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