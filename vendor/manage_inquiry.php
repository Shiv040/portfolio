
<?php
session_start();
$vendor_id = $_SESSION['vendor_id'];
if (!isset($vendor_id)) {
    header("Location:login.php");
}
include '../conn.php';
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
          <li class="breadcrumb-item" aria-current="page">List of Inquiry</li>
        </ol>
        <!-- Breadcrumb ends -->

      </div>
      <!-- App Hero header ends -->

      <!-- App body starts -->
      <div class="app-body">
        <?php
        $api_url = "http://localhost/UTSAV_HUB/api/list_inquiry.php?vendor_id=" . $vendor_id;
        $response = file_get_contents($api_url);
        $inquiries = json_decode($response, true);

        if (empty($inquiries)) {
            echo "<p>No inquiry found</p>";
        } else {
            echo "<table class='table table-bordered'>";
            echo "<thead>
            <tr>
            <th>ID</th>
            <th>Service Name</th>
            <th>Name</th><th>Email</th><th>Phone Number</th>
            <th>Other Fields</th><th>Created At</th>
            <th>Status</th>
            </tr>
            </thead>";
            echo "<tbody>";
            foreach ($inquiries as $inquiry) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($inquiry['id']) . "</td>";
                echo "<td>" . htmlspecialchars($inquiry['service_name']) . "</td>";
                echo "<td>" . htmlspecialchars($inquiry['name']) . "</td>";
                echo "<td>" . htmlspecialchars($inquiry['email']) . "</td>";
                echo "<td>" . htmlspecialchars($inquiry['phone_number']) . "</td>";
                echo "<td><button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#inquiryModal" . $inquiry['id'] . "'>View More</button></td>";
                echo "<div class='modal fade' id='inquiryModal" . $inquiry['id'] . "' tabindex='-1' aria-labelledby='inquiryModalLabel" . $inquiry['id'] . "' aria-hidden='true'>";
                echo "<div class='modal-dialog'>";
                echo "<div class='modal-content'>";
                echo "<div class='modal-header'>";
                echo "<h5 class='modal-title' id='inquiryModalLabel" . $inquiry['id'] . "'>Inquiry Details</h5>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                echo "</div>";
                echo "<div class='modal-body'>";
                $other_fields = json_decode($inquiry['other_fields'], true);
                if (!empty($other_fields)) {
                  echo "<ul class='list-group'>";
                  foreach ($other_fields as $key => $value) {
                    echo "<li class='list-group-item'>";
                    echo "<strong>" . ucfirst(htmlspecialchars($key)) . ":</strong> " . htmlspecialchars($value);
                    echo "</li>";
                  }
                  echo "</ul>";
                } else {
                  echo "<p>No additional details available</p>";
                }
                echo "</div>";
                echo "<div class='modal-footer'>";
                echo "<a href='inquiry_accept.php?id=". $inquiry['id'] ."' class='btn btn-success'><i class='bi bi-check-circle'></i> Accept</a>";
                echo "<a href='inquiry_reject.php?id=". $inquiry['id'] ."' class='btn btn-danger'><i class='bi bi-x-circle'></i> Reject</a>";
                echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'><i class='bi bi-x'></i> Close</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $inquiry['created_at']);
                $formatted_date = $date->format('d-m-y');
                echo "<td>" . htmlspecialchars($formatted_date) . "</td>";
                $status = $inquiry['status'] == 1 ? 'Accepted' : 'Pending';
                echo "<td>" . htmlspecialchars($status) . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }
        ?> </div>
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
