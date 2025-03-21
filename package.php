
<!doctype html>
<!--[if lt IE 7]>       <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>          <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>          <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="zxx"> <!--<![endif]-->

<!-- Mirrored from amentotech.com/htmls/servosell/dashboard-all-appointment.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:14:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BootStrap HTML5 CSS3 Theme</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.html">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/dashboard.css">
    <?php include('up_link.php');?>
</head>
<body>
    <!-- Preloader Start -->
    <div class="preloader-outer">
        <div class="sl-preloader-holder">
            <img src="images/loader.png" alt="loader img">
            <div class="sl-loader"></div>
        </div>
    </div>
    <!-- Preloader End -->
    <!-- HEADER START -->
    <header>
        <?php include('header.php');?>
    </header>
    <!-- HEADER END -->
    <!-- MAIN START -->
    <main class="sl-main">
        <div class="sl-main-section">
            <div class="container">
              
                    <div class="col-lg-12 col-xl-12">
                        <div class="sl-dashboardbox sl-newAppointments">
                            <div class="sl-dashboardbox__title">
                                <h2>Pacakge Detail</h2>
                            </div>
                            <?php
                            include 'conn.php';
                            
                            $query = "SELECT v.profile_pic, i.service_id, i.name AS vendor_name, i.phone_number,i.other_fields,i.status
                                      FROM inquiry i 
                                      JOIN vendor v ON v.vender_id = i.id where status=3";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                                                     while ($row = mysqli_fetch_assoc($result)) {
                                                        // Process each row
                                                      
                            ?>
                            <div class="sl-dashboardbox__content">
                                <ul>
                                    <li class="sl-newAppointments__items sl-allAppointments-notification sl-allAppointments-notification__unread">
                                        <div class="sl-newAppointments__detail">
                                            <div class="sl-newAppointments__userDetail">
                                                <div class="sl-newAppointments__userLogo">
                                                   <figure> 
                                                        
                                                        <img src="<?php echo !empty($row['profile_pic']) ? $row['profile_pic'] : 'images/avatar.png'; ?>" alt="Vendor Logo" style="height: 50px; width: 50px;">
                                                
                                                </figure>
                                                </div>
                                                <div class="sl-newAppointments__userText">
                                                <h5><a href="javascript:void(0);"><?php echo $row['vendor_name']; ?></a></h5>
                                                <p><?php echo $row['phone_number']; ?></p>
                                                </div>
                                            </div>
                                            <div class="sl-newAppointments__services">
                                                <div class="sl-newAppointments__services--description">
                                                    <h6>Date</h6>
                                                   <ul>
                                                <li><p><?php echo date('Y-m-d ', strtotime($row['other_fields'])); ?></p></li>
                                                </ul>                                            
                                                </div>
                                                <a href="javascript:void(0);" class="btn sl-btn sl-btn-md">Price</a>
                                            </div>
                                        </div>
                                    </li>
                                   
                                </ul>
                               <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN END -->
    <!-- FOOTER START -->
   
    <!-- FOOTER END -->
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/vendor/jquery-library.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/vendor/appear.js"></script>
    <script src="js/vendor/countTo.js"></script>
    <script src="js/vendor/gmap3.min.js"></script>
    <script src="js/vendor/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/vendor/select2.min.js"></script>
    <script src="js/vendor/readmore.js"></script>
    <script src="js/vendor/jquery-ui.js"></script>
    <script src="js/vendor/lightpick.js"></script>
    <script src="js/vendor/tipso.js"></script>
    <script src="js/vendor/owl.carousel.min.js"></script>
    <script src="js/vendor/jquery.ui.touch-punch.js"></script>
    <script src="js/main.js"></script>
</body>

<!-- Mirrored from amentotech.com/htmls/servosell/dashboard-all-appointment.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:14:50 GMT -->
</html>