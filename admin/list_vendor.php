<?php
    $status=$_GET['status'];    
    if($status== 0)
    {
        $query = "SELECT * FROM vendor WHERE verification_status = 0";
        $msg="List of New Vendors";
    }
    else if($status==1)
    {
        $query = "SELECT * FROM vendor WHERE verification_status = 1";
        $msg="List of Registered Vendors";
    }
    else if($status== 2)
    {
        $query = "SELECT * FROM vendor WHERE verification_status = 2";
        $msg="List of Rejected Vendors";
    }
    else
    {
        $query = "SELECT * FROM vendor WHERE verification_status = 3";
        $msg="List of Premium Vendors";
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
          <li class="breadcrumb-item" aria-current="page"><?php echo $msg;?></li>
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
                            <tr>
                              <td>
                                <img class="rounded-circle img-3x me-2" src="assets/images/user.png"
                                  alt="Bootstrap Gallery">
                              </td>
                              <td>Developer</td>
                              <td>3994 Grant View Drive, Muskego, 53150</td>
                              <td>28</td>
                              <td>28/10/2023</td>
                              <td>
                                <div class="progress small">
                                  <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>$92,000</td>
                              <td>
                                <a class="btn btn-info btn-sm" href="#"><i class="bi bi-pencil"></i>
                                </a>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <img class="rounded-circle img-3x me-2" src="assets/images/user2.png"
                                  alt="Bootstrap Gallery">
                              </td>
                              <td>Sales</td>
                              <td>
                                913 Alpaca Way, Garden Grove, California, 92643
                              </td>
                              <td>32</td>
                              <td>30/10/2023</td>
                              <td>
                                <div class="progress small">
                                  <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>$86,000</td>
                              <td>
                                <a class="btn btn-primary btn-icon btn-sm mb-1" href="#"><i class="bi bi-trash"></i>
                                </a>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <img class="rounded-circle img-3x me-2" src="assets/images/user3.png"
                                  alt="Bootstrap Gallery">
                              </td>
                              <td>Developer</td>
                              <td>
                                2343 Burwell Heights Road, Nederland, Texas, 77627
                              </td>
                              <td>36</td>
                              <td>16/11/2023</td>
                              <td>
                                <div class="progress small">
                                  <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>$78,000</td>
                              <td>
                                <a class="btn btn-info btn-sm" href="#"><i class="bi bi-pencil"></i>
                                </a>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <img class="rounded-circle img-3x me-2" src="assets/images/user4.png"
                                  alt="Bootstrap Gallery">
                              </td>
                              <td>Designer</td>
                              <td>
                                2127 Boone Crockett Lane, Seattle, Washington, 98109
                              </td>
                              <td>45</td>
                              <td>21/12/2023</td>
                              <td>
                                <div class="progress small">
                                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td>$65,000</td>
                              <td>
                                <a class="btn btn-primary btn-icon btn-sm mb-1" href="#"><i class="bi bi-trash"></i>
                                </a>
                              </td>
                            </tr>
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
