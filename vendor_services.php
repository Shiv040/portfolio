<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
    }
    include('conn.php');    
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
     <!-- MAIN START -->
     <main class="sl-main">
        <!-- SERVICE PROVIDER START -->
        <section class="sl-main-section">
            <div class="container">
                <div class="sl-filters">
                    <p><a href="javascript:void(0);">All Categories</a><i class="ti-angle-right"></i>"Service" (104,823 Results)</p>
                   <div class="sl-filters--sort">
                        <h6>Sort By:</h6>
                        <div class="sl-filters--sort__content">
                            <div class="sl-filters--sort__match">
                                <a href="javascript:void(0);" class="btn sl-btn sl-prepend sl-match-active">Best Match</a>
                                <a href="javascript:void(0);" class="btn sl-btn sl-append">Newest<i class="ti-arrows-vertical"></i></a>
                            </div>
                            <div class="sl-filters--sort__sortbtn">
                                <a href="javascript:void(0);" class="btn sl-btn sl-prepend"><i class="ti-menu"></i></a>
                                <a href="javascript:void(0);" class="btn sl-btn sl-btn-active sl-append"><i class="ti-layout-grid2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-xl-4">
                        <aside id="sl-asidebar" class="sl-asidebar">
                            <div class="sl-asideholder">
                                <a href="javascript:void(0);" id="sl-closeasidebar" class="sl-closeasidebar">
                                    <i class="lnr lnr-layers"></i>
                                </a>
                                <div class="sl-asidescrollbar">
                                    <div class="sl-searchProductSidebar">
                                        <form class="sl-sidebar__form sl-searchProductSidebar__form">
                                            <div class="sl-searchProductSidebar__content">
                                                <div class="sl-sidebar__categories">
                                                    <h5>Categories</h5>
                                                    <div class="mCustomScrollbar">
                                                        <ul class="sl-sider-ul">
                                                            <?php
                                                                $json = file_get_contents('http://localhost/UTSAV_HUB/api/list_vendors_categories.php');
                                                                $categories = json_decode($json, true);
                                                                foreach ($categories as $category) {
                                                                    ?>
                                                                    <li>
                                                                        <div class="sl-checkbox">
                                                                            <input id="categoryParent<?php echo $category['category_id']; ?>" class="sl-selectAll1" type="checkbox" name="category">
                                                                            <label for="categoryParent<?php echo $category['category_id']; ?>">
                                                                                <span class="sl-sidebar__form--heading"><?php echo $category['category_name']; ?></span>
                                                                            </label>
                                                                        </div>
                                                                        <ul>
                                                                            <?php
                                                                                $json = file_get_contents('http://localhost/UTSAV_HUB/api/list_vendor_wise_service.php?category_id='. $category['category_id']);
                                                                                $services = json_decode($json, true);
                                                                                foreach ($services as $service) {
                                                                            ?>
                                                                                <li>
                                                                                    <div class="sl-checkbox">
                                                                                        <input id="service<?php echo $service['service_id']; ?>" type="checkbox" name="service">
                                                                                        <label for="service<?php echo $service['service_id']; ?>">
                                                                                            <span class="sl-sidebar__form--text"><?php echo $service['service_name']; ?></span>
                                                                                        </label>
                                                                                    </div>
                                                                                </li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                    </li>
                                                                <?php } ?>
                                                            
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="sl-searchProductSidebar__sortPrice">
                                                    <h5>Sort By Price</h5>
                                                    <div class="sl-distance-side">
                                                        <div class="sl-distance__description">
                                                            <label for="amount">Price:</label>
                                                            <input type="text" id="amount" readonly>
                                                        </div>                                           
                                                        <div id="slider-range"></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="sl-sidebar__rating">
                                                    <h5>Sort By Rating</h5>
                                                    <div class="mCustomScrollbar">
                                                        <ul class="sl-sider-ul">
                                                            <li>
                                                                <div class="sl-checkbox">
                                                                    <input id="ratingParentside1" class="sl-selectAll2" type="checkbox" name="rating">
                                                                    <label for="ratingParentside1">
                                                                        <span class="sl-sidebar__form--text">All</span>
                                                                        <span class="sl-sidebar__form--number">12456</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="sl-checkbox">
                                                                    <input id="priceChildside1" type="checkbox" name="rating">
                                                                    <label for="priceChildside1">
                                                                        <span class="sl-featureRating">
                                                                            <span class="sl-featureRating__stars"><span></span></span>
                                                                        </span>
                                                                        <span class="sl-sidebar__form--number">3756</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="sl-checkbox">
                                                                    <input id="priceChildside2" type="checkbox" name="rating">
                                                                    <label for="priceChildside2">
                                                                        <span class="sl-featureRating">
                                                                            <span class="sl-featureRating__stars"><span></span></span>
                                                                        </span>
                                                                        <span class="sl-sidebar__form--number">75324</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="sl-checkbox">
                                                                    <input id="priceChildside3" type="checkbox" name="rating">
                                                                    <label for="priceChildside3">
                                                                        <span class="sl-featureRating">
                                                                            <span class="sl-featureRating__stars"><span></span></span>
                                                                        </span>
                                                                        <span class="sl-sidebar__form--number">2142</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="sl-checkbox">
                                                                    <input id="priceChildside4" type="checkbox" name="rating">
                                                                    <label for="priceChildside4">
                                                                        <span class="sl-featureRating">
                                                                            <span class="sl-featureRating__stars"><span></span></span>
                                                                        </span>
                                                                        <span class="sl-sidebar__form--number">657</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="sl-checkbox">
                                                                    <input id="priceChildside5" type="checkbox" name="rating">
                                                                    <label for="priceChildside5">
                                                                        <span class="sl-featureRating">
                                                                            <span class="sl-featureRating__stars"><span></span></span>
                                                                        </span>
                                                                        <span class="sl-sidebar__form--number">4542</span>
                                                                    </label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="sl-searchProductSidebar__btn">
                                                <a class="btn sl-btn sl-btn-active" href="javascript:void(0);">Apply Filter</a>
                                                <a class="btn sl-btn sl-btn-reset" href="javascript:void(0);">Reset all</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-7 col-xl-8">
                        <div class="sl-searchResultProduct">
                            <div class="row">

                                <?php
                                    $cat_id=$_GET['category_id'];
                                    $query = "SELECT price, vs.status, v.vender_id, name, service_name, cover_image,vs.vendor_ws_id
                                              FROM vendor_wise_services vs 
                                              JOIN vendor v ON vs.vender_id = v.vender_id 
                                              JOIN service s ON s.service_id = vs.service_id
                                              JOIN vendor_categories vc ON vc.category_id = v.category_id
                                              WHERE vc.category_id = $cat_id
                                              order by service_name";
                                    $result = mysqli_query($conn, $query);
                                    $total_data=mysqli_num_rows($result);
                                    if($total_data==0){
                                        echo '<br/>
                                        <br/>';
                                        echo "<h3>Currently, no vendor provides this service</h3>";
                                    }
                                    else
                                    {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if($row['status']==1){
                                            $vw_id=$row['vendor_ws_id'];                      
                                            
                                ?>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="sl-featuredProducts--post">
                                            <figure>
                                                <img src="vendor/<?php echo $row['cover_image'];?>" alt="Image Description" style="height: 200px;">
                                                <figcaption>
                                                    <div class="sl-slider__tags">
                                                        <?php if ($row['status'] == 0) { ?>
                                                            <span class="sl-bg-red-orange">Service not available</span>
                                                        <?php } ?>
                                                    </div>
                                                    <a href="javascript:void(0);"><i class="far fa-heart"></i></a>
                                                </figcaption>
                                            </figure>
                                            <div class="sl-featuredProducts--post__content">
                                                <div class="sl-featuredProducts--post__title">
                                                    <h6><?php echo strtoupper($row['service_name']); ?></h6>
                                                </div>
                                                <div class="sl-featuredProducts--post__price">
                                                    <h5>₹<?php echo $row['price']; ?></h5>
                                                </div>
                                                <div class="sl-featureRating">
                                                    <a href="http://localhost/product-rating-system/index.php?ws_id=<?php echo $row['vendor_ws_id'];?>" target="_blank">
                                                    <span class="sl-featureRating__stars"><span></span></span>
                                                    <em>(1887 Feedback)</em>
                                                    </a>
                                                </div>
                                                <em>By: <a href="javascript:void(0);"><?php echo $row['name']; ?></a></em>
                                                <?php if(!isset($_SESSION['user_id'])){ ?>
                                                <button class="btn sl-btn" onclick="alert('Please login first');">View More Info</button>
                                                <?php }else{ ?>
                                                <a href="service_details.php?vwid=<?php echo $vw_id;?>" class="btn sl-btn">View More Info</a>
                                                <?php } ?>    
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                        }
                                    }
                                }
                                ?>
                               
                            </div>
                            <?php /*if($total_data>0){ ?>
                              
                                <div class="sl-pagination">
                                <div class="sl-pagination__button-left">
                                    <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span class="lnr lnr-chevron-left"></span></a>
                                </div>
                                <div class="sl-pagination__button-num">
                                    <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span>1</span></a>
                                    <a class="btn sl-btn sl-btn-small sl-btn-active" href="javascript:void(0);"><span>2</span></a>
                                    <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span>3</span></a>
                                    <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span>4</span></a>
                                    <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span class="sl-more">...</span></a>
                                    <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span>50</span></a>
                                </div>
                                <div class="sl-pagination__button-right">
                                    <a class="btn sl-btn sl-btn-small sl-btn-active" href="javascript:void(0);"><span class="lnr lnr-chevron-right"></span></a>
                                </div>
                            </div>
                            
                            <?php }*/ ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- SERVICE PROVIDER END -->
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