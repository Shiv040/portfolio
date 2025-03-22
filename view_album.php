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
     <!-- HEADER START -->
     <header>
        <?php include('header.php');?>
    </header>
    <!-- HEADER END -->
    <!-- MAIN START -->
    <main class="sl-main">
        <div class="container">
            <div class="sl-appointment">
                <div class="sl-appointment__img">
                    <img src="images/service-provider-single/img-01.jpg" alt="Image Description">
                </div>
                <div class="sl-appointment__content">
                    <div class="sl-slider__tags">
                        <a href="javascript:void(0);" class="sl-bg-red-orange">Featured</a>
                        <a href="javascript:void(0);" class="sl-bg-green">Verified</a>
                    </div>
                    <h5>Freelance Open Desk</h5>
                    <h3>We Help You To Invent The Bright and Secure Future</h3>
                    <div class="sl-appointment__feature">
                        <div class="sl-featureRating">
                            <span class="sl-featureRating__stars"><span></span></span>
                            <em>(1642 Feedback)</em>
                        </div>
                        <div class="sl-appointment__location">
                            <em>Location: <a href="javascript:void(0);">Get Direction</a></em>
                        </div>
                    </div>
                    <div class="sl-detail">
                        <div class="sl-detail__date">
                            <em><i class="ti-calendar"></i>Since: Jun 27, 2010</em>
                        </div>
                        <div class="sl-detail__view">
                            <em><i class="ti-eye"></i>15,063 Viewed</em>
                        </div>
                        <div class="sl-detail__report">
                            <em><a href="javascript:void(0);"><i class="ti-alert"></i><span class="sl-alert-color">Report now</span></a></em>
                        </div>
                        <div class="sl-detail__report">
                            <em><a href="javascript:void(0);"><i class="ti-share"></i>Share Profile</a></em>
                        </div>
                    </div>
                </div>
                <div class="sl-appointment__note">
                    <h6>Please Note <span class="sl-alert-color">*</span></h6>
                    <em>Don’t pay anyone without getting any service</em>
                    <a href="javascript:void(0);" class="btn sl-btn" data-toggle="modal" data-target="#appointmentPopup">Make Appointment</a>
                </div>
            </div>
            <div class="sl-main-section">
                <div class="row">
                    <div class="col-lg-4 col-xl-3">
                        <aside id="sl-asidebar" class="sl-asidebar">
                            <div class="sl-asideholder">
                                <a href="javascript:void(0);" id="sl-closeasidebar" class="sl-closeasidebar">
                                    <i class="lnr lnr-layers"></i>
                                </a>           
                                <div class="sl-asidescrollbar">
                                    <div class="sl-contactDetail">
                                        <div class="sl-contactDetail__content">
                                            <h5>Contact Details</h5>
                                            <ul class="sl-contactDetail__descripton">
                                                <li><i class="ti-location-pin sl-address-icon"></i><address>Roundhouse Ln, London, UK</address></li>
                                                <li><i class="ti-headphone sl-headphone-icon"></i><a href="javascript:void(0);">(016977) 4303</a></li>
                                                <li><i class="ti-email sl-email-icon"></i><a href="javascript:void(0);">john@company.com</a></li>
                                                <li><i class="ti-mobile sl-mobile-icon"></i><a href="javascript:void(0);">202-555-0160</a></li>
                                                <li><i class="ti-star sl-star-icon"></i><span class="sl-status">Status: <em>online</em></span></li>
                                                <li><i class="ti-world sl-world-icon"></i><a href="javascript:void(0);">www.company.com</a></li>
                                            </ul>
                                            <ul class="sl-contactDetail__brands">
                                                <li class="sl-facebook"><a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a></li>
                                                <li class="sl-facebook-messenger"><a href="javascript:void(0);"><i class="fab fa-facebook-messenger"></i></a></li>
                                                <li class="sl-dribbble"><a href="javascript:void(0);"><i class="fab fa-dribbble"></i></a></li>
                                                <li class="sl-pinterestp"><a href="javascript:void(0);"><i class="fab fa-pinterest-p"></i></a></li>
                                                <li class="sl-quora"><a href="javascript:void(0);"><i class="fab fa-quora"></i></a></li>
                                                <li class="sl-googleplus"><a href="javascript:void(0);"><i class="fab fa-google-plus-g"></i></a></li>
                                            </ul>
                                            <a href="javascript:void(0);" class="btn sl-btn" data-toggle="modal" data-target="#contactpopup">Contact Provider</a>
                                        </div>
                                        <div class="sl-contactDetail__qr">
                                            <div class="sl-contactDetail__qr--img">
                                                <a href="javascript:void(0);"><img src="images/service-provider-single/img-02.jpg" alt="Image Description"></a>
                                            </div>
                                            <div class="sl-contactDetail__qr--content">
                                                <span class="sl-contactDetail__qr--icon"><i class="lnr lnr-laptop-phone"></i></span>
                                                <span>Scan with your</span>
                                                <h6><span>Smart Phone</span></h6>
                                                <span>To Get It Handy.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sl-product-provider">
                                        <div class="sl-product-provider__title">
                                            <h6>Products By This Provider</h6>
                                        </div>
                                        <div id="slProductProviderOwl" class="owl-carousel owl-theme sl-owl-dot">
                                            <div class="item">
                                                <div class="sl-featuredProducts--post">
                                                    <figure>
                                                        <img src="images/index/featured-products/img-01.jpg" alt="Image Description">
                                                        <figcaption>
                                                            <div class="sl-slider__tags">
                                                                <a href="javascript:void(0);" class="sl-bg-red-orange">25% OFF</a>
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
                                            <div class="item">
                                                <div class="sl-featuredProducts--post">
                                                    <figure>
                                                        <img src="images/index/featured-products/img-02.jpg" alt="Image Description">
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
                                            <div class="item">
                                                <div class="sl-featuredProducts--post">
                                                    <figure>
                                                        <img src="images/index/featured-products/img-03.jpg" alt="Image Description">
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
                                            <div class="item">
                                                <div class="sl-featuredProducts--post">
                                                    <figure>
                                                        <img src="images/index/featured-products/img-04.jpg" alt="Image Description">
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
                                        <div class="sl-product-provider__btn">
                                            <a href="javascript:void(0);" class="btn sl-btn sl-btn-active">View All Products</a>
                                        </div>
                                    </div>
                                    <div class="sl-sidebar-ad">
                                       <a href="javascript:void(0);"><img src="images/service-provider-single/ad.jpg" alt="Image Description"></a> 
                                        <p>Advertisement<span>255px X 355px</span></p>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="sl-aboutFreelance">
                            <div class="sl-title">
                                <h4>About “Freelance Open Desk”</h4>
                            </div>
                            <div class="sl-aboutFreelance__description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempoer incididunt utenalo labore etesdolore magna aliqua. Ut enim ad minim veniam, quis nrud exercitation ullamco laboris nisi ut aliquip acommodo consequat. duis auete irure dolor in reprehenderit in voluptate velit.</p>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sede perspiciatis unde omnis iste natus error sitame voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaete ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicoe Nemo enim ipsam voluptatem quia voluptas sitae aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porrom quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.</p>
                            </div>
                        </div>
                        <div class="sl-languageWeKnow">
                            <div class="sl-title">
                                <h4>Languages We Know</h4>
                            </div>
                            <table class="table sl-languageWeKnow__content">
                                <tbody>
                                    <tr>
                                        <td>English</td>
                                        <td>French</td>
                                        <td>Chinese</td>
                                        <td>Arabic</td>
                                    </tr>
                                    <tr>
                                        <td>Spanish</td>
                                        <td>Russian</td>
                                        <td>Portuguese</td>
                                        <td>Urdu</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="sl-experience">
                            <div class="sl-title">
                                <h4>Experience</h4>
                            </div>
                            <div class="sl-posts">
                                <div class="sl-post">
                                    <div class="sl-post__content">
                                        <img src="images/service-provider-single/experience/img-01.jpg" alt="Image Description">
                                        <div class="sl-post__title">
                                            <a href="javascript:void(0);">Bright Future Group & Company</a>
                                            <h5>Business Planner Manager</h5>
                                            <span>May 2011 - Jun 2012</span>
                                        </div>
                                    </div>
                                    <div class="sl-post__description">
                                        <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                    </div>
                                </div>
                                <div class="sl-post">
                                    <div class="sl-post__content">
                                        <img src="images/service-provider-single/experience/img-02.jpg" alt="Image Description">
                                        <div class="sl-post__title">
                                            <a href="javascript:void(0);">Delta Communication & Development</a>
                                            <h5>Sr. Business Planner</h5>
                                            <span>Jul 2012 - Aug 2013</span>
                                        </div>
                                    </div>
                                    <div class="sl-post__description">
                                        <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                    </div>
                                </div>
                                <div class="sl-post">
                                    <div class="sl-post__content">
                                        <img src="images/service-provider-single/experience/img-03.jpg" alt="Image Description">
                                        <div class="sl-post__title">
                                            <a href="javascript:void(0);">Human Power & Company</a>
                                            <h5>Business Coordinator</h5>
                                            <span>Nov 2014 - Aug 2015</span>
                                        </div>
                                    </div>
                                    <div class="sl-post__description">
                                        <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sl-awards">
                            <div class="sl-title">
                                <h4>Certificates & Awards</h4>
                            </div>
                            <div class="sl-awards__content">
                                <div class="row">
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="sl-awards__card">
                                            <img src="images/service-provider-single/awards/img-01.jpg" alt="Image Description">
                                            <div class="sl-awards__description">
                                                <h6>December 31, 1969</h6>
                                                <h5>Best Service Provider</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="sl-awards__card">
                                            <img src="images/service-provider-single/awards/img-02.jpg" alt="Image Description">
                                            <div class="sl-awards__description">
                                                <h6>December 31, 1969</h6>
                                                <h5>Best Service Provider</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="sl-awards__card">
                                            <img src="images/service-provider-single/awards/img-03.jpg" alt="Image Description">
                                            <div class="sl-awards__description">
                                                <h6>December 31, 1969</h6>
                                                <h5>Best Service Provider</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sl-amenities">
                            <div class="sl-title">
                                <h4>Amenities and Features</h4>
                            </div>
                            <table class="table sl-languageWeKnow__content sl-amenities__content">
                                <tbody>
                                    <tr>
                                        <td><i class="ti-credit-card"></i>Accepts Credit Cards</td>
                                        <td><i class="ti-package"></i>Beauty Shop</td>
                                    </tr>
                                    <tr>
                                        <td><i class="ti-server"></i>Bike Parking</td>
                                        <td><i class="ti-light-bulb"></i>Comfortable chairs</td>
                                    </tr>
                                    <tr>
                                        <td><i class="ti-harddrive"></i>Courtyard</td>
                                        <td><i class="ti-infinite"></i>Free coffee and tea</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="sl-offerServices">
                            <div class="sl-title">
                                <h4>Offered Services</h4>
                            </div>
                            <div class="sl-posts">
                                <div class="sl-post">
                                    <div class="sl-post__content">
                                        <img src="images/service-provider-single/experience/img-04.jpg" alt="Image Description">
                                        <div class="sl-post__title">
                                            <h5>Web Development & Designing</h5>
                                            <span>£250.00 / Hour</span>
                                        </div>
                                    </div>
                                    <div class="sl-post__description">
                                        <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                    </div>
                                </div>
                                <div class="sl-post">
                                    <div class="sl-post__content">
                                        <img src="images/service-provider-single/experience/img-05.jpg" alt="Image Description">
                                        <div class="sl-post__title">
                                            <h5>SEO & Web Optimization</h5>
                                            <span>£150.00 / Hour</span>
                                        </div>
                                    </div>
                                    <div class="sl-post__description">
                                        <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                    </div>
                                </div>
                                <div class="sl-post">
                                    <div class="sl-post__content">
                                        <img src="images/service-provider-single/experience/img-06.jpg" alt="Image Description">
                                        <div class="sl-post__title">
                                            <h5>Mobile App And Game Development</h5>
                                            <span>£350.00 / Hour</span>
                                        </div>
                                    </div>
                                    <div class="sl-post__description">
                                        <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sl-audioVideoGallery">
                            <div class="sl-title">
                                <h4>Audio/Video Gallery</h4>
                            </div>
                            <div class="sl-audioVideoGallery__content">
                                <figure>
                                    <a href="javascript:void(0);"><img src="images/service-provider-single/video-gallery/img-01.jpg" alt="Image Description"></a>
                                </figure>
                                <figure>
                                   <a class="sl-video__img" data-rel="prettyPhoto" href="https://youtu.be/XxxIEGzhIG8"><img src="images/service-provider-single/video-gallery/img-02.jpg" alt="Image Description"></a> 
                                </figure>
                                <figure>
                                    <a href="javascript:void(0);"><img src="images/service-provider-single/video-gallery/img-03.jpg" alt="Image Description"></a>
                                </figure>
                            </div>
                        </div>
                        <div class="sl-customerReviews">
                            <div class="sl-title">
                                <h4>Customer Reviews</h4>
                            </div>
                            <div class="sl-posts">
                                <div class="sl-post">
                                    <div class="sl-post__content">
                                        <div class="sl-round"><h4>AK</h4></div>
                                        <div class="sl-post__title">
                                            <span class="sl-featureRating__stars"><span></span></span>
                                            <h5>Great Service Of Its Own Category</h5>
                                            <span>10 min ago</span>
                                        </div>
                                    </div>
                                    <div class="sl-post__description">
                                        <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                    </div>
                                </div>
                                <div class="sl-post">
                                    <div class="sl-post__content">
                                        <div class="sl-round"><h4>RU</h4></div>
                                        <div class="sl-post__title">
                                            <span class="sl-featureRating__stars"><span></span></span>
                                            <h5>Great Quality But Loose Focus At The End</h5>
                                            <span>02 hrs ago</span>
                                        </div>
                                    </div>
                                    <div class="sl-post__description">
                                        <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                    </div>
                                </div>
                                <div class="sl-post">
                                    <div class="sl-post__content">
                                        <div class="sl-round"><h4>UI</h4></div>
                                        <div class="sl-post__title">
                                            <span class="sl-featureRating__stars"><span></span></span>
                                            <h5>Used Old Approach But Yes Acceptable</h5>
                                            <span>03 years ago</span>
                                        </div>
                                    </div>
                                    <div class="sl-post__description">
                                        <p>Dolor sit amet consectetur adipisicing elit, sed do eiusmod tempoer incididunt ut labore dolore magna aliquau ut enim ad minim veniam, quis nrud exercitation ullamco laboris.</p>
                                    </div>
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
    </main><footer>
        <?php include("footer.php");?>
    </footer>
    <!-- FOOTER END -->
    <?php include("down_link.php");?>
    <script src="js/vendor/prettyPhoto.js"></script>
    <script src="js/vendor/moment.min.js"></script>
    <script src="js/vendor/fullcalendar.min.js"></script>
    <script src="js/vendor/jquery.ui.touch-punch.js"></script>
</body>

<!-- Mirrored from amentotech.com/htmls/servosell/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:14:31 GMT -->
</html>