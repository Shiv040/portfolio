<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
    }
?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->

<!-- Mirrored from amentotech.com/htmls/servosell/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:13:45 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Utsav Hub</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.html">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
	<?php include('up_link.php');?>
</head>
<body class="sl-home">
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
    <!-- BANNER START -->
    <?php include("banner.php");?>
    <!-- BANNER END -->
    <!-- MAIN START -->
    <main class="sl-main">
        <!-- CATEGORY START -->
            <?php include("vendor_list.php");?>
        <!-- CATEGORY END -->
        <!-- COMMUNITY START -->
        <section>
            <div class="sl-community">
                <div class="sl-overlay">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="sl-community__content sl-main-section">
                                    <div class="sl-community__description">
                                        <h5>We're Spreading Day by Day</h5>
                                        <h2>Join Our Friendy Community</h2>
                                        <p>Consectetur adipisicing elit sed dotiane eiusmod tempor incididunt utna labore etnalorale magna aliqua enim ad minim veniam quis nostrud exerciteon ullamco.</p>
                                    </div>
                                    <div class="sl-community__btn">
                                        <a href="javascript:void(0);" class="btn sl-btn sl-btn-active">Register Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- COMMUNITY END -->
        <!-- SERVICE PROVIDER START -->
        <?php include("top_service.php");?>
        <!-- SERVICE PROVIDER END -->
        <!-- STATS START -->
        <section>
            <div class="sl-statsBanner">
                <div class="sl-overlay">
                    <div class="container">
                        <div id="counter" class="sl-stats sl-main-section">
                            <div class="sl-stats__content">
                                <i class="ti-face-smile"></i>
                                <div class="sl-stats__description">
                                    <h3 data-from="0" data-to="35125" data-speed="8000" data-refresh-interval="50">35,125</h3>
                                    <p>Happy Clients</p>
                                </div>
                            </div>
                            <div class="sl-stats__content">
                                <i class="ti-user"></i>
                                <div class="sl-stats__description">
                                    <h3 data-from="0" data-to="12556" data-speed="8000" data-refresh-interval="50">12,556</h3>
                                    <p>Active Members</p>
                                </div>
                            </div>
                            <div class="sl-stats__content">
                                <i class="ti-shopping-cart"></i>
                                <div class="sl-stats__description">
                                    <h3 data-from="0" data-to="41856" data-speed="8000" data-refresh-interval="50">41,856</h3>
                                    <p>Products For Sale</p>
                                </div>
                            </div>
                            <div class="sl-stats__content">
                                <i class="ti-cup"></i>
                                <div class="sl-stats__description">
                                    <h3 data-from="0" data-to="14753" data-speed="8000" data-refresh-interval="50">14,753</h3>
                                    <p>Cup Of Coffee</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- STATS END -->
        <!-- PACKAGES START -->
        <?php include("package.php");?>
        <!-- PACKAGES END -->
        <!-- FEEDBACK START -->
        <?php include("feedback.php");?>
        <!-- FEEDBACK END -->
        
    </main>
    <!-- MAIN END -->
    <!-- FOOTER START -->
    <footer>
        <?php include("footer.php");?>
    </footer>
    <!-- FOOTER END -->
    <?php include("down_link.php");?>
</body>

<!-- Mirrored from amentotech.com/htmls/servosell/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:14:31 GMT -->
</html>