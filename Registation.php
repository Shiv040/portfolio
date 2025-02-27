<?php
    if(isset($_GET['code']))
    {
        $code=$_GET['code'];

    }
?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="zxx"> <!--<![endif]-->

<!-- Mirrored from amentotech.com/htmls/servosell/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:15:35 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration Page</title>
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
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/tipso.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
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
    <!-- MAIN START -->
    <main class="sl-main sl-register-main">
        <div class="sl-registerfixed">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="sl-register-holder">
                            <div class="sl-registerarea">
                                <div class="sl-registersignarea">
                                    <div class="sl-registersignarea__title">
                                        <h3>Signup For Vendor and User</h3>
                                    </div>
                                    <ul class="nav sl-registertabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo (isset($code) && $code == 1) ? 'active' : ''; ?>" id="sl-signupcustomer" data-toggle="tab" href="#signupcustomer" role="tab" aria-selected="<?php echo (isset($code) && $code == 1) ? 'true' : 'false'; ?>">
                                                <span><i class="fa fa-check"></i></span>
                                                <h4><em>Signup as</em> Simple Customer
                                                </h4>
                                                <i class="ti-info-alt toltip-content" data-tipso="Custome"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo (isset($code) && $code == 2) ? 'active' : ''; ?>" id="sl-signupprovider" data-toggle="tab" href="#signupprovider" role="tab" aria-selected="<?php echo (isset($code) && $code == 2) ? 'true' : 'false'; ?>">
                                                <span><i class="fa fa-check"></i></span>
                                                <h4><em>Signup as</em> Vendor(Service Provider)
                                                </h4>
                                                <i class="ti-info-alt toltip-content" data-tipso="Provider"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content sl-signup" id="pills-tabContent">
                                        <div class="tab-pane fade <?php echo (isset($code) && $code == 1) ? 'show active' : ''; ?>" id="signupcustomer" role="tabpanel" aria-labelledby="sl-signupcustomer">
                                            <form class="sl-formtheme sl-signupform" method="post">
                                                <fieldset>
                                                                <div class="sl-signupform-wrap">
                                                                    <div class="form-group">
                                                                        <input type="text" name="email" value="" class="form-control sl-form-control" placeholder="Email*" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="password" name="password" value="" class="form-control sl-form-control" placeholder="Password*" required="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <i class="ti-info-alt toltip-content" data-tipso="name"></i>
                                                                        <input type="text" name="uname" value="" class="form-control sl-form-control" placeholder="Username*" required="">
                                                                    </div>
                                                                    <div class="form-group form-group-half">
                                                                        <input type="number" name="Phone" value="" class="form-control sl-form-control" placeholder="Phone*" required="">
                                                                    </div>
                                                                    <div class="form-group sl-btnarea">
                                                                        <div class="sl-checkbox">
                                                                            <input id="terms" type="checkbox" name="category">
                                                                            <label for="terms">
                                                                                <span>I agree to <a href="javascript:void(0);">Terms and Conditions</a></span>
                                                                            </label>
                                                                        </div>
                                                                        <button type="submit" name="btnS" class="btn sl-btn">Signup</button>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade <?php echo (isset($code) && $code == 2) ? 'show active' : ''; ?>" id="signupprovider" role="tabpanel" aria-labelledby="sl-signupprovider">
                                            <form class="sl-formtheme sl-signupform" method="post" action="process_registration.php">
                                                <fieldset>
                                                    <div class="sl-signupform-wrap">
                                                        <div class="form-group form-group-half form-group-icon">
                                                            <i class="ti-info-alt toltip-content" data-tipso="name"></i>
                                                            <input type="text" name="name" value="" class="form-control sl-form-control" placeholder="Name*" required="">
                                                        </div>

                                                        <div class="form-group form-group-half">
                                                            <div class="sl-select">
                                                                <select name="category_id" required>
                                                                    <option value="" hidden="">Select Category*</option>
                                                                    <?php
                                                                    $json = file_get_contents('http://localhost/utsav_hub/api/list_vendors_categories.php');
                                                                    $categories = json_decode($json, true);
                                                                    foreach ($categories as $category) {
                                                                        echo '<option value="' . $category['category_id'] . '">' . $category['category_name'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="address" class="form-control" placeholder="Address*" required="" length="" rows="2"></textarea>
                                                        </div>

                                                        <div class="form-group form-group-half">
                                                            <div class="sl-select">
                                                                <select name="city_id" required>
                                                                    <option value="" hidden="">Select City*</option>
                                                                    <option value="">Surat</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-group-half">

                                                            <div class="sl-select">
                                                                <select name="area_id" required>
                                                                    <option value="" hidden="">Select Area*</option>
                                                                    <?php
                                                                    $json = file_get_contents('http://localhost/utsav_hub/api/list_area.php');
                                                                    $areas = json_decode($json, true);
                                                                    foreach ($areas as $area) {
                                                                        echo '<option value="' . $area['area_id'] . '">' . $area['area_name'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" name="email" value="" class="form-control sl-form-control" placeholder="Email*" required="">
                                                        </div>


                                                        <div class="form-group form-group-half">
                                                            <input type="text" name="mobile_number" value="" class="form-control sl-form-control" placeholder="Phone*" required="">
                                                        </div>
                                                        <div class="form-group form-group-half">
                                                            <input type="password" name="password" value="" class="form-control sl-form-control" placeholder="Password*" required="">
                                                        </div>

                                                        <div class="form-group sl-btnarea">
                                                            <div class="sl-checkbox">
                                                                <input id="terms2" type="checkbox" name="category">
                                                               
                                                            </div>
                                                            <div style="text-align: center;">
                                                                <button type="submit" class="btn sl-btn">Signup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                   

                                </div>
                                
                                
                            </div>
                            <div class="sl-registercontent">
                                <figure class="sl-registercontent__img">
                                    <img src="images/register/img-01.jpg" alt="img">
                                    <figcaption>
                                       
                                        
                                        <div class="sl-descritpion">
                                            <p>Welcome to UtsavHub, your trusted partner in seamless wedding management. Our login page is designed to be both elegant and user-friendly, reflecting the joy and sophistication of your special day. Here’s what you can expect:</p>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN END -->
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
    <script src="js/vendor/countdown.js"></script>
    <script src="js/vendor/backgroundstretch.js"></script>
    <script src="js/main.js"></script>
    <script>
        $.backstretch("images/register/main-bg.jpg");
    </script>
    <?php
    include ('conn.php');
    if(isset($_POST['btnS'])){
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $name = $_POST['uname'];
        $phone = $_POST['Phone'];
        $sql = "INSERT INTO users (email, password, name, phone) VALUES ('$email', '$pwd', '$name', '$phone')";
        if (mysqli_query($conn, $sql)) {
           
            echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Registration successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php';
                }
            });
        </script>";
        
    } else {
        echo "<script>
            Swal.fire({
            title: 'Error!',
            text: 'Registration failed',
            icon: 'error',
            confirmButtonText: 'OK'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'Registation.php';
            }
            });
        </script>";
    }
}
?>
</body>

<!-- Mirrored from amentotech.com/htmls/servosell/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 10:15:37 GMT -->

</html>
