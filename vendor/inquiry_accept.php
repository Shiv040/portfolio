
<?php
session_start();
$vendor_id = $_SESSION['vendor_id'];
if (!isset($vendor_id)) {
    header("Location:login.php");
}
include '../conn.php';
$inquiry_id = $_GET['id'];
$update_query = "UPDATE inquiry SET status='1' WHERE id=?";
$stmt = $conn->prepare($update_query);
$stmt->bind_param("i", $inquiry_id);
$stmt->execute();
$stmt->close();
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
          <li class="breadcrumb-item" aria-current="page">Inquiry Accept</li>
        </ol>
        <!-- Breadcrumb ends -->

      </div>
      <!-- App Hero header ends -->

      <!-- App body starts -->
      <div class="app-body">
        <?php
        $inquiry_id = $_GET['id'];
        $query = "SELECT name, email,service_name
         FROM inquiry i 
         join service s 
         on s.service_id=i.service_id
          WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $inquiry_id);
        $stmt->execute();
        $stmt->bind_result($name, $email,$service_name);
        $stmt->fetch();
        $stmt->close();

        
        ?>
        <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; padding: 20px; background-color: #f9f9f9; }
        .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); }
        h1 { color: #4CAF50; }
        .info { margin-bottom: 15px; }
        .footer { margin-top: 20px; font-style: italic; color: #777; }
    </style>
    <div class="container">
        <h1>Thank You for Choosing Utsav Hub!</h1>
        <p>We are pleased to inform you that we have accepted your inquiry. The next steps are outlined on our website for your convenience.</p>

        <div class="info">
            <strong>Inquiry Person Name:</strong><?php echo htmlspecialchars($name); ?><br>
            <strong>Service Name:</strong><?php echo htmlspecialchars($service_name); ?> <br>
            <strong>Person ID:</strong> <?php echo htmlspecialchars($email); ?><br>
        </div>

        <p>Please make the payment according to the policy provided on our service page. Once the payment is confirmed, we will proceed to deliver our best service to you.</p>

        <p>If you have any additional details or preferences, please let us know. We are committed to ensuring your satisfaction and delivering quality service. For any further questions or support, feel free to reach out.</p>

        <div class="footer">Thank you for trusting Utsav Hub.<br>Warm regards,<br>The Utsav Hub Team</div></div>
     
      </div>
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
