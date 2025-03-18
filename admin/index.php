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
                <a href="#" data-bs-toggle="modal" data-bs-target="#userModal"><h2 class="m-0 fw-bold text-black"><?php echo $user_count;?></h2>
                <h5 class="m-0 fw-bold text-black">Users</h5></a>

                <!-- User Modal -->
                <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <?php
                      $user_data_sql = "SELECT email, name, phone FROM users";
                      $user_data_result = $conn->query($user_data_sql);
                      if ($user_data_result) {
                      echo "<table class='table table-striped'>";
                      echo "<thead><tr><th>Email</th><th>Name</th><th>Phone Number</th></tr></thead>";
                      echo "<tbody>";
                      while ($user_data = $user_data_result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($user_data['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($user_data['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($user_data['phone']) . "</td>";
                        echo "</tr>";
                      }
                      echo "</tbody>";
                      echo "</table>";
                      } else {
                      echo "<p>No user data found.</p>";
                      // Optionally, log or display error here
                      }
                    ?>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                  </div>
                </div>
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
                    <a href="#" data-bs-toggle="modal" data-bs-target="#vendorModal"><h2 class="m-0 fw-bold text-black"><?php echo $vendor_count;?></h2>
                    <h5 class="m-0 fw-bold text-black">Vendors</h5></a>

                    <!-- Vendor Modal -->
                        <div class="modal fade" id="vendorModal" tabindex="-1" aria-labelledby="vendorModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="vendorModalLabel">Vendor Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <?php
                            $vendor_data_sql = "SELECT v.email, v.name, v.mobile_number, vc.category_name 
                                FROM vendor v 
                                JOIN vendor_categories vc ON v.category_id = vc.category_id";
                            $vendor_data_result = $conn->query($vendor_data_sql);
                            if ($vendor_data_result) {
                            echo "<table class='table table-striped'>";
                            echo "<thead><tr><th>Email</th><th>Name</th><th>Phone Number</th><th>Category Name</th></tr></thead>";
                            echo "<tbody>";
                            while ($vendor_data = $vendor_data_result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($vendor_data['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($vendor_data['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($vendor_data['mobile_number']) . "</td>";
                            echo "<td>" . htmlspecialchars($vendor_data['category_name']) . "</td>";
                            echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            } else {
                            echo "<p>No vendor data found.</p>";
                            // Optionally, log or display error here
                            }
                            ?>
                          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                          </div>
                        </div>
                        </div>
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