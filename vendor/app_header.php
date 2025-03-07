<?php

include '..\conn.php';
if(isset($_SESSION['vendor_id'])){
  $v_id = $_SESSION['vendor_id'];
  $v_query = "SELECT * FROM vendor WHERE vender_id = '$v_id'";
  $v_query_run = mysqli_query($conn, $v_query);
  if(mysqli_num_rows($v_query_run) > 0){
    $v_data = mysqli_fetch_assoc($v_query_run);
  }
}
else{
  header('Location: login.php');
}


?>
<div class="app-header d-flex align-items-center">

  <!-- Toggle buttons starts -->
  <div class="toggle-buttons-container">
    <button class="toggle-sidebar">
      <i class="bi bi-list lh-1"></i>
    </button>
    <button class="pin-sidebar">
      <i class="bi bi-list lh-1"></i>
    </button>
  </div>
  <!-- Toggle buttons ends -->

  <!-- App brand starts -->
  <div class="app-brand">
    <a href="index.html" class="d-flex">
      <img src="assets/images/create utsav hub logo.jpg" class="logo" alt="Utsav Hub Logo" width="100" height="50" style="margin: 10px; padding:0px;"/>
    </a>
  </div>
  <!-- App brand ends -->

  <!-- App header actions starts -->
  <div class="header-actions">

    <!-- Search container start -->
    <div class="search-container d-lg-block d-none">
      <input type="text" class="form-control" id="search" placeholder="Search">
      <i class="bi-search"></i>
    </div>
    <!-- Search container end -->

    <!-- User settings start -->
    <div class="dropdown">
      <a id="userSettings" class="dropdown-toggle d-flex p-2 pe-0 ms-3 align-items-center" href="#!"
        role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="me-2 text-white d-md-block d-none"><?php echo $v_data['name'];?></span>
        <img src="assets/images/user.png" class="rounded-2 img-3x" alt="User Image" />
      </a>
      <div class="dropdown-menu dropdown-menu-end">
        <div class="px-3">Vendor</div>
        <div class="mx-3 my-2 d-grid gap-1">
            <a href="profile.php ?vendor_id= <?php echo $v_id;  ?>" class="btn btn-light">Profile</a>
          <a href="logout.php" class="btn btn-warning">Logout</a>
        </div>
      </div>
    </div>
    <!-- User settings end -->

  </div>
  <!-- App header actions ends -->

</div>
