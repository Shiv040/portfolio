<?php
$api_url = "http://localhost/utsav_hub/api/get_vendor_details.php?vendor_id=" . $vendor_id;
$response = file_get_contents($api_url);
$vendor_details = json_decode($response, true);

if ($vendor_details && isset($vendor_details[0])) {
    $vendor = $vendor_details[0];
    $name = $vendor['name'];
    $logo= $vendor['logo'] ? $vendor['logo'] : 'images/blog-single/user-imgs/img-05.jpg';
    $profile_pic = $vendor['profile_pic'] ? $vendor['profile_pic'] : 'images/blog-single/user-imgs/img-05.jpg';
    $created_at = $vendor['created_at'];
    $business_name = $vendor['business_name'];
    $email = $vendor['email'];
    $mobile_number = $vendor['mobile_number'];
    $category_name = $vendor['category_name'];
    $address = $vendor['address'];
    $verification_status = $vendor['verification_status'];
    $services = $vendor['services'];
} else {
    // Handle error or set default values
    $name = "Unknown Vendor";
    $profile_pic = 'images/blog-single/user-imgs/img-05.jpg';
    $created_at = "";
    $business_name = "";
    $email = "";
    $mobile_number = "";
    $category_name = "";
    $address = "";
    $verification_status = "";
}
?>
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
                                <img src="vendor/logo_image/<?php echo $logo;?>"
                                    alt="Image Description">
                            </figure>
                            <div class="sl-profile-content">
                                <span><?php echo date("F j, Y", strtotime($created_at)); ?></span>
                                <h3><?php echo $name;?></h3>
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
                                <a href="javascript:void(0);" class="btn sl-btn">View Profile</a>
                            </div>
                        </div>
                        
                        <div class="sl-widget">
                            <div class="sl-widget__title">
                                <h3>Other Service</h3>
                            </div>
                            <div class="sl-widget__content">
                                <ul class="sl-widget__categories">
                                    
                                    <?php if (!empty($services)) : ?>
                                        <?php foreach ($services as $service) : ?>
                                            <?php if (!empty($service['price'])) : ?>
                                                <li>
                                                    <a href="javascript:void(0)"><?php echo htmlspecialchars($service['service_name']); ?>
                                                        <span><?php echo htmlspecialchars($service['price']); ?></span></a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <li>No services available</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </aside>
</div>