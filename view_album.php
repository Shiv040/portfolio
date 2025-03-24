<?php
include("conn.php");
$album_id = $_GET['album_id'];

$sql = "SELECT * FROM `vendor_wise_work_image` WHERE album_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $album_id);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$conn->close();
?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->

<!-- Mirrored from amentotech.com/htmls/servosell/service-provider-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:15:29 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BootStrap HTML5 CSS3 Theme</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.html">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome/fontawesome-all.css">
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/lightpick.css">
    <link rel="stylesheet" href="css/fullcalendar.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/tipso.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" href="css/main.css">
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
   <br/>
   <br/>
   <br/>
   <br/>
   <br/>
   <br/>
    <!-- INNER BANNER START -->
    <div class="sl-inner-banner">
        <!-- IMG SLIDER START -->
        <div id="serviceProviderSingleBanner" class="owl-carousel owl-theme sl-owl-nav">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="item">
                    <div class="sl-img" style="height: 300px; overflow: hidden;">
                        <figure>
                            <a class="sl-prettyPhotoImg" href="vendor/vendor_work/<?php echo $row['image_name']; ?>" rel="prettyPhoto[gallery]">
                                <img src="vendor/vendor_work/<?php echo $row['image_name']; ?>" alt="Image Description">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                                    <path id="Rectangle_1_copy" data-name="Rectangle 1 copy" class="cls-1" d="M26.156,2h1.688V52H26.156V2ZM2,26.156H52v1.688H2V26.156Z" transform="translate(-2 -2)"/>
                                </svg>
                            </a>
                        </figure>
                    </div>
                </div>
            <?php } ?>
            
            
        </div>
        <!-- IMG SLIDER END -->
    </div>
    <!-- INNER BANNER END -->
    <!-- MAIN START -->
    <main class="sl-main">
        
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
    <script src="js/vendor/prettyPhoto.js"></script>
    <script src="js/vendor/moment.min.js"></script>
    <script src="js/vendor/fullcalendar.min.js"></script>
    <script src="js/vendor/jquery.ui.touch-punch.js"></script>
    <script src="js/main.js"></script>
</body>

<!-- Mirrored from amentotech.com/htmls/servosell/service-provider-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:15:35 GMT -->
</html>