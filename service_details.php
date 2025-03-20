<?php
session_start();
include 'conn.php';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query_user = "SELECT `user_id`, `email`, `password`, `name`, `phone`, `created_at` FROM `users` WHERE user_id=?";
    $stmt_user = $conn->prepare($query_user);
    $stmt_user->bind_param("i", $user_id);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();
    $user_details = $result_user->fetch_assoc();
}
$vw_id = filter_input(INPUT_GET, 'vwid', FILTER_SANITIZE_NUMBER_INT);

$query = "SELECT vender_id,vs.description, vs.price, vs.cover_image, s.service_name 
    FROM vendor_wise_services vs 
    join service s 
    on s.service_id=vs.service_id
    WHERE vendor_ws_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $vw_id);
$stmt->execute();
$result = $stmt->get_result();
$service_details = $result->fetch_assoc();
$vendor_id = $service_details['vender_id'];

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
    <?php include 'up_link.php'; ?>
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
        <?php include 'header.php'; ?>
    </header>
    <!-- MAIN START -->
    <main class="sl-main">
        <section class="sl-main-section">
            <div class="container">
                <div class="sl-product">
                    <div class="row">
                        <div class="col-lg-5">
                            <div id="sl-sync1" class="sl-product__img owl-carousel owl-theme">
                                <div class="sl-item item">
                                    <figure>
                                        <img src="vendor/<?php echo $service_details['cover_image']; ?>" alt="Image Description" style="width:100%; height:auto; max-height:500px;">
                                    </figure>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-7">
                            <div class="sl-product__description">

                                <h5><?php echo strtoupper($service_details['service_name']); ?></h5>
                                <div class="sl-product__price">
                                    <h3>&#8377; <?php echo $service_details['price']; ?></h3>
                                    <h4>&#8377; <?php echo $service_details['price'] * 1.10; ?></h4>
                                </div>
                                <div class="sl-product__stars">
                                    <div class="sl-appointment__feature">
                                        <div class="sl-featureRating">
                                            <span class="sl-featureRating__stars"><span></span></span>
                                            <em>(1642 Feedback)</em>
                                        </div>

                                    </div>
                                </div>

                                <div class="sl-product__stock">
                                    <div class="sl-product__stock--content">
                                        <a href="javascript:void(0);" class="btn sl-btn sl-cart-btn" data-toggle="modal" data-target="#inquiryModal">Inquiry</a>


                                    </div>
                                </div>
                                <div class="sl-product__safty">
                                    <img src="images/product-single/img-01.png" alt="Image Description">
                                    <div class="sl-product__safty--description">
                                        <h6>Important Instruction:</h6>
                                        <p>Note: The price displayed here is not the final price. It may vary based on
                                            other criteria.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="inquiryModal" tabindex="-1" role="dialog" aria-labelledby="inquiryModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="inquiryModalLabel">Inquiry for <?php echo $service_name=$service_details['service_name'];?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="inquiry.php" method="post">
                            
                        <div class="modal-body">
                            <input type="hidden" name="vendor_id" value="<?php echo $vendor_id;?>">
                            <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?php echo $user_details['name'];?>" readonly>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?php echo $user_details['email'];?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" value="<?php echo $user_details['phone'];?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $file_name = 'inquiry_' . str_replace([' ', '/'], '_', strtolower($service_name)) . '.php';
                                include($file_name);
                                ?>
                                <div class="form-group">
                                    <label for="other_info">Other Information</label>
                                    <textarea class="form-control" id="other_info" name="other_info" placeholder="Enter any other information"></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send Inquiry</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="sl-twocolumns" class="sl-twocolumns sl-inner-product">
                <div class="container">
                    <div class="row">
                        <?php include("vendor_profile_section.php"); ?>
                        <?php include("dynamic_tab.php"); ?>
                    </div>
                </div>
            </div>
            </div>
        </section>

    </main>
    <!-- MAIN END -->
    <!-- FOOTER START -->
    <footer>
        <?php include "footer.php"; ?>
    </footer>
    <!-- FOOTER END -->
    <?php include "down_link.php"; ?>
    <script src="js/vendor/prettyPhoto.js"></script>
</body>

<!-- Mirrored from amentotech.com/htmls/servosell/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:14:31 GMT -->

</html>