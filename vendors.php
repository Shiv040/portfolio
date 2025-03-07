<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
include('conn.php');
?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="zxx"> <!--<![endif]-->

<!-- Mirrored from amentotech.com/htmls/servosell/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:13:45 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Utsav Hub</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.html">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <?php include('up_link.php'); ?>
</head>

<body class="sl-home">

    <!-- HEADER START -->
    <header>
        <?php include('header.php'); ?>
    </header>
    <!-- BANNER START -->
    <div class="sl-venderBanner-holder">
        <div id="slVendorSingleOwl" class="owl-carousel owl-theme" style="height: 400px;">
            <div class="item"><img src="images/index/main-banner/img-01.jpg" alt="Image Description" style="height: 100%; object-fit: cover;"></div>
            <div class="item"><img src="images/index/main-banner/img-02.jpg" alt="Image Description" style="height: 100%; object-fit: cover;"></div>
            <div class="item"><img src="images/index/main-banner/img-03.jpg" alt="Image Description" style="height: 100%; object-fit: cover;"></div>
        </div>
        <div class="sl-venderBanner">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 col-lg-4 col-xl-5">
                        <div class="sl-venderSearch">

                            <div class="sl-venderSearch__searcharea">
                                <div class="sl-input-group">
                                    <input class="form-control sl-form-control sl-prepend" type="text" placeholder="Quick Search of Service">
                                    <button class="sl-searcharea-btn"><i class="lnr lnr-magnifier"></i></button>
                                </div>
                            </div>
                            <nav class="sl-venderSearch__nav">
                                <ul>
                                    <?php
                                    $json = file_get_contents('http://localhost/utsav_hub/api/list_vendors_categories.php');
                                    $categories = json_decode($json, true);

                                    foreach ($categories as $category) {
                                    ?>
                                        <li class="menu-item-has-children">
                                            <a href="javascript:void(0);"><?php echo $category['category_name']; ?></a>
                                            <ul class="sub-menu">
                                                <?php
                                                $services_json = file_get_contents('http://localhost/utsav_hub/api/list_vendor_wise_service.php?category_id=' . $category['category_id']);
                                                $services = json_decode($services_json, true);
                                                foreach ($services as $service) {
                                                ?>
                                                    <li><a href="javascript:void(0);"><?php echo $service['service_name']; ?></a></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                            </nav>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- BANNER END -->
    <!-- MAIN START -->
    <main class="sl-main">
    </main>
    <!-- MAIN END -->
    <!-- FOOTER START -->

    <!-- FOOTER END -->
    <?php include("down_link.php"); ?>
</body>

<!-- Mirrored from amentotech.com/htmls/servosell/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:14:31 GMT -->

</html>