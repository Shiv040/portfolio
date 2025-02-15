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
          <?php include('app_header.php');?>
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

          <!-- App body starts -->
          <div class="app-body">

          </div>
          <!-- App body ends -->

          <!-- App footer starts -->
          <?php include('footer.php');?>    
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
    <?php include('down_link.php');?>   
  </body>
</html>