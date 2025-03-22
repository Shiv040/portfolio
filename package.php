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
    <link rel="stylesheet" href="css/dashboard.css">
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
        <?php include('header.php'); ?>
    </header>
    <!-- HEADER END -->
    <main class="sl-main">
        <div class="sl-main-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-xl-12">
                        
                        <div class="sl-dashboardbox sl-newAppointments">
                            <div class="sl-dashboardbox__title">
                                <h2>Package Detail</h2>
                            </div>
                            <div class="sl-dashboardbox__content">
                                <ul>
                                    <?php

                                    $query = "SELECT * 
                                              FROM inquiry i 
                                              JOIN vendor_wise_services vs 
                                              ON vs.service_id = i.service_id
                                              JOIN vendor v  
                                              ON v.vender_id = i.vender_id
                                              join service s
                                              on s.service_id = i.service_id
                                              WHERE vs.vender_id = i.vender_id AND i.status = 3";
                                    $result = mysqli_query($conn, $query);
                                    $total_price=0;
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $price = $row['price'];
                                            $total_price=$price+$total_price;
                                            echo '<li class="sl-newAppointments__items sl-allAppointments-notification sl-allAppointments-notification__unread">';
                                            echo '<div class="sl-newAppointments__detail">';
                                            echo '<div class="sl-newAppointments__userDetail">';
                                            echo '<div class="sl-newAppointments__userLogo">';
                                            echo '<figure>';
                                            echo '<img src="vendor/'.$row['cover_image'].'" alt="Image Description" style="width: 100px; height: 100px; object-fit: cover;">';
                                            echo '</figure>';
                                            echo '</div>';
                                            echo '<div class="sl-newAppointments__userText">';
                                            echo '<div class="sl-slider__tags">';
                                            echo '</div>';
                                            echo '<h5><a href="javascript:void(0);">' . $row['service_name'] . '</a></h5>';
                                            echo '<p>' . date('M d, @ h:ia', strtotime($row['created_at'])) . '</p>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '<div class="sl-newAppointments__services">';
                                            echo '<div class="sl-newAppointments__services--description">';
                                            echo '<h6>Vendor Information:</h6>';
                                            echo '<ul>';
                                            echo '<li><p>' . strtoupper($row['name']) . '</p></li>';
                                            echo '</ul>';
                                            echo '</div>';
                                            echo '<a href="javascript:void(0);" class="btn sl-btn sl-btn-md">₹' . number_format($price, 2) . '</a>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</li>';
                                        }
                                    } else {
                                        echo '<li>No inquiries found.</li>';
                                    }
                                    ?>
                                </ul>

                            </div>
                        </div>

                        <div class="sl-balance-info">
                            <ul>
                                <li>
                                    <div class="sl-balance-holder">
                                        <div class="sl-balance">
                                            <figure>
                                                <img src="images/insight/img-01.png" alt="img description">
                                            </figure>
                                            <div class="sl-balancecontent">
                                                <div class="sl-balanceheading">
                                                    <h4>₹<?php echo $total_price;?></h4>
                                                    <span>Total Payment</span>
                                                </div>
                                                <div class="sl-refreshbtn">
                                                    <a href="javascript:void(0);">
                                                        <i class="ti-reload"></i>
                                                        <span>Refresh</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="sl-balance-holder">
                                        <div class="sl-balance">
                                            <figure>
                                                <img src="images/insight/img-02.png" alt="img description">
                                            </figure>
                                            <div class="sl-balancecontent">
                                                <div class="sl-balanceheading">
                                                    <h4>₹<?php echo $total_price/2;?></h4>
                                                    <span>Half Payment Must be Paid</span>
                                                </div>
                                                <div class="sl-paymentbtn">
                                                    <form action="razorpay_payment.php" method="POST">
                                                        <script
                                                            src="https://checkout.razorpay.com/v1/checkout.js"
                                                            data-key="rzp_test_AIurRjzMPH3oOR"
                                                            data-amount="<?php echo ($total_price/2) * 100; ?>"
                                                            data-currency="INR"
                                                            data-name="Utsav Hub"
                                                            data-description="Half Payment"
                                                            data-image="images/favicon.png"
                                                            data-prefill.name="<?php echo $user_name; ?>"
                                                            data-prefill.email="<?php echo $user_email; ?>"
                                                            data-theme.color="#F37254">
                                                        </script>
                                                        <button type="submit" class="btn sl-btn sl-btn-md">Pay Now</button>
                                                        <?php $order_id = mt_rand(100000, 999999); ?>
                                                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                                                        <input type="hidden" name="amount" value="<?php echo $total_price/2; ?>">
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN END -->
    <!-- FOOTER START -->
    <footer>
        <?php include("footer.php"); ?>
    </footer>
    <!-- FOOTER END -->
    <?php include("down_link.php"); ?>
</body>

<!-- Mirrored from amentotech.com/htmls/servosell/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:14:31 GMT -->

</html>