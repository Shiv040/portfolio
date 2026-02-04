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
                                            <form class="sl-formtheme sl-signupform" method="post" onsubmit="return validateCustomerForm()">
                                                <fieldset>
                                                    <div class="sl-signupform-wrap">
                                                        <div class="form-group">
                                                            <input type="text" name="email" id="email" value="" class="form-control sl-form-control" placeholder="Email*">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" name="password" id="password" value="" class="form-control sl-form-control" placeholder="Password*" >
                                                        </div>
                                                        <div class="form-group">
                                                            <i class="ti-info-alt toltip-content" data-tipso="name"></i>
                                                            <input type="text" name="uname" id="uname" value="" class="form-control sl-form-control" placeholder="Username*">
                                                        </div>
                                                        <div class="form-group form-group-half">
                                                            <input type="number" name="Phone" id="phone" value="" class="form-control sl-form-control" placeholder="Phone*">
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
                                        <script>
                                            function validateCustomerForm() {
                                                const email = document.getElementById('email').value;
                                                const password = document.getElementById('password').value;
                                                const uname = document.getElementById('uname').value;
                                                const phone = document.getElementById('phone').value;

                                                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                                if (!emailPattern.test(email)) {
                                                    alert('Please enter a valid email address.');
                                                    return false;
                                                }

                                                if (password.length < 6) {
                                                    alert('Password must be at least 6 characters long.');
                                                    return false;
                                                }

                                                if (uname.trim() === '') {
                                                    alert('Username is required.');
                                                    return false;
                                                }

                                                if (phone.length !== 10 || isNaN(phone)) {
                                                    alert('Please enter a valid 10-digit phone number.');
                                                    return false;
                                                }

                                                return true;
                                            }
                                        </script>
                                        <div class="tab-pane fade <?php echo (isset($code) && $code == 2) ? 'show active' : ''; ?>" id="signupprovider" role="tabpanel" aria-labelledby="sl-signupprovider">
                                            <form class="sl-formtheme sl-signupform" method="post" action="process_registration.php" onsubmit="return validateProviderForm()">
                                                <fieldset>
                                                    <div class="sl-signupform-wrap">
                                                        <div class="form-group form-group-half form-group-icon">
                                                            <i class="ti-info-alt toltip-content" data-tipso="name"></i>
                                                            <input type="text" name="name" id="provider_name" value="" class="form-control sl-form-control" placeholder="Name*" >
                                                        </div>

                                                        <div class="form-group form-group-half">
                                                            <div class="sl-select">
                                                                <select name="category_id" id="provider_category" >
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
                                                            <textarea name="address" id="provider_address" class="form-control" placeholder="Address" length="" rows="2"></textarea>
                                                        </div>

                                                        <div class="form-group form-group-half">
                                                            <div class="sl-select">
                                                                <select name="city_id" id="provider_city">
                                                                    <option value="-1" hidden="">Select City*</option>
                                                                    <option value="1">Surat</option>
                                                                    <option value="2">Vapi</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-group-half">
                                                            <div class="sl-select">
                                                                <select name="area_id" id="provider_area" >
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
                                                            <input type="text" name="email" id="provider_email" value="" class="form-control sl-form-control" placeholder="Email*">
                                                        </div>

                                                        <div class="form-group form-group-half">
                                                            <input type="text" name="mobile_number" id="provider_phone" value="" class="form-control sl-form-control" placeholder="Phone*" >
                                                        </div>
                                                        <div class="form-group form-group-half">
                                                            <input type="password" name="password" id="provider_password" value="" class="form-control sl-form-control" placeholder="Password*">
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
                                    <script>
                                        function validateProviderForm() {
                                            const name = document.getElementById('provider_name').value;
                                            const category = document.getElementById('provider_category').value;
                                            const address = document.getElementById('provider_address').value;
                                            const city = document.getElementById('provider_city').value;
                                            const area = document.getElementById('provider_area').value;
                                            const email = document.getElementById('provider_email').value;
                                            const phone = document.getElementById('provider_phone').value;
                                            const password = document.getElementById('provider_password').value;

                                            if (name.trim() === '') {
                                                alert('Name is required.');
                                                return false;
                                            }

                                            if (category === '') {
                                                alert('Please select a category.');
                                                return false;
                                            }

                                            if (address.trim() === '') {
                                                alert('Address is required.');
                                                return false;
                                            }

                                            if (city === '-1') {
                                                alert('Please select a city.');
                                                return false;
                                            }

                                            if (area === '') {
                                                alert('Please select an area.');
                                                return false;
                                            }

                                            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                            if (!emailPattern.test(email)) {
                                                alert('Please enter a valid email address.');
                                                return false;
                                            }

                                            if (phone.length !== 10 || isNaN(phone)) {
                                                alert('Please enter a valid 10-digit phone number.');
                                                return false;
                                            }

                                            if (password.length < 6) {
                                                alert('Password must be at least 6 characters long.');
                                                return false;
                                            }

                                            return true;
                                        }
                                    </script>
                                       
                                    </div>
                                   

                                </div>
                                
                                
                            </div>
                            <div class="sl-registercontent">
                                <figure class="sl-registercontent__img">
                                    <img src="images/register/img-01.jpg " alt="img">
                                    <figcaption>
                                        <strong class="sl-registerlogo">
                                            <a href="index-2.html"><img src="images/register/create utsav hub logo.jpg" alt="Images Description" style="width: 150px; height: auto;"></a>
                                        </strong>
                                    
                             
                                        <div class="sl-descritpion">
                                            <p>Welcome to UtsavHub, your trusted partner in seamless wedding management,Birthday celebration,and other management. Our login page is designed to be both elegant and user-friendly, reflecting the joy and sophistication of your special day. Here’s what you can expect:</p>
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
