<?php
session_start();
include 'conn.php';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
$vw_id = $_GET['vwid'];

$query = "SELECT vs.description, vs.price, vs.cover_image, s.service_name 
    FROM vendor_wise_services vs 
    join service s 
    on s.service_id=vs.service_id
    WHERE vendor_ws_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $vw_id);
$stmt->execute();
$result = $stmt->get_result();
$service_details = $result->fetch_assoc();

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
                                        <img src="vendor/<?php echo $service_details['cover_image']; ?>"
                                            alt="Image Description">
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
                                        <div class="sl-appointment__location">
                                            <em>By: <a href="javascript:void(0);">Onfleek Gaming Zone</a></em>
                                        </div>
                                    </div>
                                </div>


                                <div class="sl-product__stock">

                                    <div class="sl-product__stock--content">

                                        <a href="javascript:void(0);" class="btn sl-btn sl-cart-btn">Inquiry</a>
                                        <a href="javascript:void(0);" class="btn sl-btn sl-btn-active">Book Now</a>
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
            <div id="sl-twocolumns" class="sl-twocolumns sl-inner-product">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-xl-3">
                            <aside id="sl-asidebar" class="sl-asidebar">
                                <div class="sl-asideholder">
                                    <a href="javascript:void(0);" id="sl-closeasidebar" class="sl-closeasidebar">
                                        <i class="lnr lnr-layers"></i>
                                    </a>
                                    <div class="sl-asidescrollbar">
                                        <div id="sl-sidebarprivacy" class="sl-sidebarprivacy">
                                            <div class="sl-widget-holder">
                                                <div class="sl-widget sl-widget-profile">
                                                    <figure class="sl-profileimg">
                                                        <img src="images/blog-single/user-imgs/img-05.jpg"
                                                            alt="Image Description">
                                                    </figure>
                                                    <div class="sl-profile-content">
                                                        <span>June 27, 2014</span>
                                                        <h3>Gaynell Rockefeller</h3>
                                                        <ul class="sl-socialicons">
                                                            <li class="sl-facebook"><a href="javascript:void(0);"><i
                                                                        class="fab fa-facebook-f"></i></a></li>
                                                            <li class="sl-twitter"><a href="javascript:void(0);"><i
                                                                        class="fab fa-twitter"></i></a></li>
                                                            <li class="sl-youtube"><a href="javascript:void(0);"><i
                                                                        class="fab fa-youtube"></i></a></li>
                                                            <li class="sl-instagram"><a href="javascript:void(0);"><i
                                                                        class="fab fa-instagram"></i></a></li>
                                                        </ul>
                                                        <a href="javascript:void(0);" class="btn sl-btn">View All
                                                            Posts</a>
                                                    </div>
                                                </div>
                                                <div class="sl-widget">
                                                    <div class="sl-widget__title">
                                                        <h3>Search</h3>
                                                    </div>
                                                    <div class="sl-widget__content">
                                                        <div class="sl-input-group">
                                                            <input class="form-control sl-form-control sl-prepend"
                                                                type="text" placeholder="Search Here">
                                                            <button class="btn sl-btn sl-btn-active sl-append"><i
                                                                    class="lnr lnr-magnifier"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sl-widget">
                                                    <div class="sl-widget__title">
                                                        <h3>Categories</h3>
                                                    </div>
                                                    <div class="sl-widget__content">
                                                        <ul class="sl-widget__categories">
                                                            <li>
                                                                <a href="javascript:void(0)">Smart Phones
                                                                    <span>12456</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)">Tablets
                                                                    <span>3756</span></a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="javascript:void(0)">Wearables<span>75324</span></a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="javascript:void(0)">Headphones<span>2142</span></a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="javascript:void(0)">Chargers<span>657</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sl-sidebar-ad">
                                                <a href="javascript:void(0);"><img
                                                        src="images/service-provider-single/ad.jpg"
                                                        alt="Image Description"></a>
                                                <p>Advertisement<span>255px X 355px</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="col-lg-8 col-xl-9">
                            <div class="sl-tab">
                                <nav class="nav">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-productDescription-tab"
                                            data-toggle="tab" href="#nav-productDescription" role="tab"
                                            aria-controls="nav-productDescription" aria-selected="true">Service
                                            Description</a>
                                        <a class="nav-item nav-link" id="nav-faqs-tab" data-toggle="tab"
                                            href="#nav-faqs" role="tab" aria-controls="nav-faqs"
                                            aria-selected="true">Booking Policy</a>
                                        <a class="nav-item nav-link" id="nav-reviews-tab" data-toggle="tab"
                                            href="#nav-reviews" role="tab" aria-controls="nav-reviews"
                                            aria-selected="true">Reviews</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-productDescription" role="tabpanel"
                                        aria-labelledby="nav-productDescription-tab">
                                        <div class="sl-productDescripton">
                                            <div class="sl-productDescripton__premium">
                                                <div class="sl-productDescripton__text">
                                                    <h4>Service Description</h4>
                                                    <p><?php echo $service_details['description']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-faqs" role="tabpanel" aria-labelledby="nav-faqs-tab">
                                    <div class="sl-faqs">
                                        <div class="sl-tab__text">
                                            <h4>Booking Policy</h4>
                                            <?php
                                            $query_policy = "SELECT * FROM booking_policy WHERE vendor_ws_id = ?";
                                            $stmt_policy = $conn->prepare($query_policy);
                                            $stmt_policy->bind_param("i", $vw_id);
                                            $stmt_policy->execute();
                                            $result_policy = $stmt_policy->get_result();
                                            if ($result_policy->num_rows > 0) {
                                                $policy_details = $result_policy->fetch_assoc();
                                                echo "<p>" . $policy_details['policy'] . "</p>";
                                            } else {
                                                echo "<p>No policy found</p>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-reviews" role="tabpanel"
                                    aria-labelledby="nav-reviews-tab">
                                    <div class="sl-reviews">
                                        <div class="sl-reviews__ratingProgress">
                                            <div class="sl-reviews__userRating">
                                                <img src="images/product-single/Reviews/img-01.jpg"
                                                    alt="Image Description">
                                                <h3>4.0 / <span>5</span></h3>
                                                <div class="sl-featureRating">
                                                    <span class="sl-featureRating__stars"><span></span></span>
                                                </div>
                                                <p>(1887 Feedback)</p>
                                            </div>
                                            <div class="sl-reviews__progressbar">
                                                <div class="sl-tab__text">
                                                    <h5>Users Rating Breakdown</h5>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed
                                                        eiusmod</p>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class="sl-reviews__progressbar--description">
                                                            <p>05 Stars - </p>
                                                            <h6>90% Reviews</h6>
                                                        </div>
                                                        <div id="progressbar1"></div>
                                                    </li>
                                                    <li>
                                                        <div class="sl-reviews__progressbar--description">
                                                            <p>04 Stars - </p>
                                                            <h6>70% Reviews</h6>
                                                        </div>
                                                        <div id="progressbar2"></div>
                                                    </li>
                                                    <li>
                                                        <div class="sl-reviews__progressbar--description">
                                                            <p>03 Stars - </p>
                                                            <h6>32% Reviews</h6>
                                                        </div>
                                                        <div id="progressbar3"></div>
                                                    </li>
                                                    <li>
                                                        <div class="sl-reviews__progressbar--description">
                                                            <p>02 Stars - </p>
                                                            <h6>20% Reviews</h6>
                                                        </div>
                                                        <div id="progressbar4"></div>
                                                    </li>
                                                    <li>
                                                        <div class="sl-reviews__progressbar--description">
                                                            <p>01 Stars - </p>
                                                            <h6>05% Reviews</h6>
                                                        </div>
                                                        <div id="progressbar5"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="sl-customerReviews">
                                            <div class="sl-title">
                                                <h4>Customer Reviews</h4>
                                            </div>
                                            <div class="sl-posts">
                                                <div class="sl-post">
                                                    <div class="sl-post__content">
                                                        <div class="sl-round">
                                                            <h4>AK</h4>
                                                        </div>
                                                        <div class="sl-post__title">
                                                            <span class="sl-featureRating__stars"><span></span></span>
                                                            <h5>Great Product Of Its Own Category</h5>
                                                            <span>10 min ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="sl-post__description">
                                                        <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod
                                                            tempoer incididunt ut labore dolore magna aliquau ut enim ad
                                                            minim veniam, quis nrud exercitation ullamco laboris.</p>
                                                    </div>
                                                </div>
                                                <div class="sl-post">
                                                    <div class="sl-post__content">
                                                        <div class="sl-round">
                                                            <h4>RU</h4>
                                                        </div>
                                                        <div class="sl-post__title">
                                                            <span class="sl-featureRating__stars"><span></span></span>
                                                            <h5>Great Quality But Loose Focus At The Wire</h5>
                                                            <span>02 hrs ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="sl-post__description">
                                                        <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod
                                                            tempoer incididunt ut labore dolore magna aliquau ut enim ad
                                                            minim veniam, quis nrud exercitation ullamco laboris.</p>
                                                    </div>
                                                </div>
                                                <div class="sl-post">
                                                    <div class="sl-post__content">
                                                        <div class="sl-round">
                                                            <h4>UI</h4>
                                                        </div>
                                                        <div class="sl-post__title">
                                                            <span class="sl-featureRating__stars"><span></span></span>
                                                            <h5>This is Old Tech But Yes Acceptable</h5>
                                                            <span>03 years ago</span>
                                                        </div>
                                                    </div>
                                                    <div class="sl-post__description">
                                                        <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod
                                                            tempoer incididunt ut labore dolore magna aliquau ut enim ad
                                                            minim veniam, quis nrud exercitation ullamco laboris.</p>
                                                    </div>
                                                    <figure class="sl-post__figure">
                                                        <img src="images/product-single/Reviews/img-02.jpg"
                                                            alt="Image Description">
                                                        <img src="images/product-single/Reviews/img-03.jpg"
                                                            alt="Image Description">
                                                        <img src="images/product-single/Reviews/img-04.jpg"
                                                            alt="Image Description">
                                                    </figure>
                                                </div>
                                            </div>
                                            <div class="sl-customerReviews__btn">
                                                <a href="javascript:void(0);" class="btn sl-btn">Load More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="sl-sellerRecommend">
                    <h4>Seller Recommendations</h4>
                    <div class="row">
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="sl-featuredProducts--post">
                                <figure>
                                    <img src="images/index/featured-products/img-13.jpg" alt="Image Description">
                                    <figcaption>
                                        <div class="sl-slider__tags">
                                            <span class="sl-bg-red-orange">25% OFF</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                    </figcaption>
                                </figure>
                                <div class="sl-featuredProducts--post__content">
                                    <div class="sl-featuredProducts--post__title">
                                        <h6>Phanteks 614LTG special edition</h6>
                                    </div>
                                    <div class="sl-featuredProducts--post__price">
                                        <h5>$212.30</h5>
                                        <h6>$220.30</h6>
                                    </div>
                                    <div class="sl-featureRating">
                                        <span class="sl-featureRating__stars"><span></span></span>
                                        <em>(1887 Feedback)</em>
                                    </div>
                                    <em>By: <a href="javascript:void(0);">Onfleek Gaming Zone</a></em>
                                    <button class="btn sl-btn">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="sl-featuredProducts--post">
                                <figure>
                                    <img src="images/index/featured-products/img-14.jpg" alt="Image Description">
                                    <figcaption>
                                        <div class="sl-slider__tags">
                                            <span class="sl-bg-red-orange">10% OFF</span>
                                        </div>
                                        <a href="javascript:void(0);" class="sl-liked"><i class="far fa-heart"></i></a>
                                    </figcaption>
                                </figure>
                                <div class="sl-featuredProducts--post__content">
                                    <div class="sl-featuredProducts--post__title">
                                        <h6>Linkwow 3 Outlet Power Strip</h6>
                                    </div>
                                    <div class="sl-featuredProducts--post__price">
                                        <h5>$12.19</h5>
                                        <h6>$19.99</h6>
                                    </div>
                                    <div class="sl-featureRating">
                                        <span class="sl-featureRating__stars"><span></span></span>
                                        <em>(1887 Feedback)</em>
                                    </div>
                                    <em>By: <a href="javascript:void(0);">Techsol Bros.</a></em>
                                    <button class="btn sl-btn">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="sl-featuredProducts--post">
                                <figure>
                                    <img src="images/index/featured-products/img-15.jpg" alt="Image Description">
                                    <figcaption>
                                        <div class="sl-slider__tags">
                                            <span class="sl-bg-red-orange">50% OFF</span>
                                        </div>
                                        <a href="javascript:void(0);" class="sl-liked"><i class="far fa-heart"></i></a>
                                    </figcaption>
                                </figure>
                                <div class="sl-featuredProducts--post__content">
                                    <div class="sl-featuredProducts--post__title">
                                        <h6>Nub's Adventures Jailbreak</h6>
                                    </div>
                                    <div class="sl-featuredProducts--post__price">
                                        <h5>$26.40</h5>
                                        <h6>$30.50</h6>
                                    </div>
                                    <div class="sl-featureRating">
                                        <span class="sl-featureRating__stars"><span></span></span>
                                        <em>(1887 Feedback)</em>
                                    </div>
                                    <em>By: <a href="javascript:void(0);">Catepilar Fleet</a></em>
                                    <button class="btn sl-btn">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="sl-featuredProducts--post">
                                <figure>
                                    <img src="images/index/featured-products/img-16.jpg" alt="Image Description">
                                    <figcaption>
                                        <div class="sl-slider__tags">
                                            <span class="sl-bg-red-orange">12% OFF</span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                    </figcaption>
                                </figure>
                                <div class="sl-featuredProducts--post__content">
                                    <div class="sl-featuredProducts--post__title">
                                        <h6>Kensington Contour 2.0 Backpack</h6>
                                    </div>
                                    <div class="sl-featuredProducts--post__price">
                                        <h5>$12.19</h5>
                                        <h6>$19.99</h6>
                                    </div>
                                    <div class="sl-featureRating">
                                        <span class="sl-featureRating__stars"><span></span></span>
                                        <em>(1887 Feedback)</em>
                                    </div>
                                    <em>By: <a href="javascript:void(0);">Bags &amp; Bags Co.</a></em>
                                    <button class="btn sl-btn">Add To Cart</button>
                                </div>
                            </div>
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