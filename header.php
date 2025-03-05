<div class="sl-main-header">
    <strong class="sl-main-header__logo">
        <a href="index-2.html"><img src="images/create utsav hub logo.jpg" alt="Logo"
                style="width: 100px; height: auto;"></a>
    </strong>
    <div class="sl-main-header__content">
        <div class="sl-main-header__upper">
            <form class="sl-main-form">
                <div class="sl-form-group sl-main-form__input1 sl-loading">
                    <input class="form-control sl-form-control" type="text" placeholder="Search anything you want">
                </div>
                <div class="sl-form-group sl-main-form__input2">
                    <input class="form-control sl-form-control" type="text" placeholder="Detect my location">
                    <a href="javascript:void(0);" class="sl-right-icon sl-arrow-icon"><i class="ti-angle-down"></i></a>
                    <a href="javascript:void(0);" class="sl-right-icon"><i class="ti-target"></i></a>
                    <div class="sl-distance">
                        <div class="sl-distance__description">
                            <label for="amountfour">Distance:</label>
                            <input type="text" id="amountfour" readonly>
                        </div>
                        <div id="slider-range-min"></div>
                    </div>
                </div>
                <div class="sl-form-group sl-main-form__input3">
                    <div class="sl-select">
                        <select>
                            <option hidden="">Service Providers</option>
                            <option>type 1</option>
                            <option>type 2</option>
                            <option>type 3</option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="sl-input-group">
                <a href="javascript:void(0);" class="btn sl-btn sl-btn-active sl-advance-btn">
                    <span>Search Now</span>
                    <span>
                        <em class="sl-advance-icon">
                            <i></i>
                            <i></i>
                            <i></i>
                        </em>
                    </span>
                </a>
            </div>
            <div class="sl-main-form__btn">
                <a href="javascript:void(0);" class="btn sl-btn sl-btn-active"><i class="ti-search"></i></a>
            </div>

            <?php
                if(isset($user_id))
                { 
                    include("login_user_header.php");
                }
                else
                {
                    include("visitor_header.php");
                }
            ?>
        </div>
        <div class="sl-main-header__lower">
            <nav class="navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#slMainNavbar"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="lnr lnr-menu"></i>
                </button>
                <div class="collapse navbar-collapse sl-navigation" id="slMainNavbar">
                   <?php include("menu.php");?>
                </div>
            </nav>
            <div class="sl-lower-right">
                <div class="sl-lower-right__content">
                    <i class="fas fa-mobile-alt"></i>
                    <p>Expreience our mobile app - <a href="javascript:void(0);">Download Now</a></p>
                </div>
                <div class="sl-lower-right__content">
                    <i class="fas fa-plane"></i>
                    <p>Free shipping over 2M locations</p>
                    <i class="ti-info-alt toltip-content" data-tipso="Location"></i>
                </div>
                <div class="sl-lower-right__content sl-dropdown">
                    <a href="javascript:void(0);">
                        <i class="fas fa-headphones-alt"></i>Help<i class="fas fa-caret-down"></i>
                    </a>
                    <ul class="sl-dropdown__menu">
                        <li class="nav-item">
                            <a href="">Vendor Detail Page</a>
                        </li>
                        <li class="nav-item">
                            <a href="Registation.php?code=1">Register as Customer</a>
                        </li>
                        <li class="nav-item">
                            <a href="Registation.php?code=2">Register as Vendor</a>
                        </li>
                        <li class="nav-item">
                            <a href="vendor/login.php">Login as Vendor</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sl-main-header__lower--btn">
                <a href="javascript:void(0);" class="btn sl-btn sl-btn-active">More Info</a>
            </div>
            <div class="sl-main-lowerBackbtn">
                <a href="javascript:void(0);"><i class="ti-close"></i></a>
            </div>
        </div>
    </div>
    <!-- Login Popup Start-->
    <div class="modal fade sl-loginpopup" tabindex="-1" role="dialog" id="loginpopup" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="sl-modalcontent modal-content">
                <div class="sl-popuptitle">
                    <h4>User Login</h4>
                    <a href="javascript:void(0);" class="sl-closebtn close"><i class="lnr lnr-cross"
                            data-dismiss="modal"></i></a>
                </div>
                <div class="modal-body">
                    <form class="sl-formtheme sl-formlogin" action="check_user_login.php" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control sl-form-control"
                                    placeholder="Your Email*">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control sl-form-control" placeholder="Password*" name="password">
                            </div>
                            <div class="form-group sl-btnarea">
                                <input type="submit" class="btn sl-btn" value="login"/>
                            </div>
                        </fieldset>
                    </form>
                    
                </div>
                <div class="modal-footer">
                    <div class="sl-loginfooterinfo">
                        <a href="Registation.php"><em>Not a member?</em> Signup Now</a>
                        <a href="forget_password.php" class="sl-forgot-password">Forgot password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Popup End-->
</div>