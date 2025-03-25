<div class="sl-topbar-notify">
    <div class="sl-topbar-notify__icons dropdown sl-dropdown">
        <a href="javascript:void(0);" class="sl-topbar-notify__anchor" id="slMessages" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti-email"></i>
            <span class="sl-topbar-notify__circle">
                <em class="sl-bg-green">0</em>
            </span>
        </a>
        <!--<ul class="dropdown-menu sl-dropdown__menu sl-dropdown__notify" aria-labelledby="slMessages">
            <li class="nav-item">
                <a href="javascript:void(0);" class="sl-unread-messages sl-dropdown__notify__text">
                    <i class="ti-email"></i><span>Adipisicing elit sed doiusmod tempor incide sed
                        doiusmod</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0);" class="sl-unread-messages sl-dropdown__notify__text">
                    <i class="ti-email"></i><span>Consectetur adipisice elitsed eiusmod temp</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0);" class="sl-unread-messages sl-dropdown__notify__text">
                    <i class="ti-email"></i><span>Incididunt ut labore et dolore magna aliqua</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0);" class="sl-dropdown__notify__text">
                    <i class="ti-email"></i><span>Enim ad minim veniam quis nostrud</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0);" class="sl-dropdown__notify__text">
                    <i class="ti-email"></i><span>Exercitation ullamco laboris nisi ut aliquip</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0);" class="sl-dropdown__notify__showall">Show All</a>
            </li>
        </ul>-->
    </div>
    
    <div class="sl-topbar-notify__icons dropdown">
        <a href="javascript:void(0);" class="sl-topbar-notify__anchor" id="slCart" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="ti-shopping-cart"></i>
            <span class="sl-topbar-notify__circle">
                <em class="sl-bg-blue">12</em>
            </span>
        </a>
        <!--<div class="dropdown-menu sl-dropdown__cart" aria-labelledby="slCart">
            <h6>Shopping Cart</h6>
            <ul>
                <li>
                    <img src="images/index/cart/img-01.png" alt="Image Description">
                    <div class="sl-dropdown__cart__description">
                        <a class="sl-cart-title" href="javascript:void(0);">Earbuds Earphones Stereo</a>
                        <span class="sl-cart-price">$11.19</span>
                        <a class="sl-cart-delete" href="javascript:void(0);">Delete Item</a>
                    </div>
                    <form class="sl-vlaue-btn">
                        <a href="javascript:void(0);" class="sl-input-decrement">-</a>
                        <input class="sl-input-number" type="number" value="1" min="0" max="1000">
                        <a href="javascript:void(0);" class="sl-input-increment">+</a>
                    </form>
                </li>
                <li>
                    <img src="images/index/cart/img-02.png" alt="Image Description">
                    <div class="sl-dropdown__cart__description">
                        <a class="sl-cart-title" href="javascript:void(0);">Vintage Round Sunglasses</a>
                        <span class="sl-cart-price">$13.50</span>
                        <a class="sl-cart-delete" href="javascript:void(0);">Delete Item</a>
                    </div>
                    <form class="sl-vlaue-btn">
                        <a href="javascript:void(0);" class="sl-input-decrement">-</a>
                        <input class="sl-input-number" type="number" value="1" min="0" max="1000">
                        <a href="javascript:void(0);" class="sl-input-increment">+</a>
                    </form>
                </li>
                <li>
                    <img src="images/index/cart/img-03.png" alt="Image Description">
                    <div class="sl-dropdown__cart__description">
                        <a class="sl-cart-title" href="javascript:void(0);">Phone Holder for Car</a>
                        <span class="sl-cart-price">$8.30</span>
                        <a class="sl-cart-delete" href="javascript:void(0);">Delete Item</a>
                    </div>
                    <form class="sl-vlaue-btn">
                        <a href="javascript:void(0);" class="sl-input-decrement">-</a>
                        <input class="sl-input-number" type="number" value="1" min="0" max="1000">
                        <a href="javascript:void(0);" class="sl-input-increment">+</a>
                    </form>
                </li>
            </ul>
            <div class="sl-cart-footer">
                <div class="sl-cart-footer__total">
                    <span>Subtotal</span>
                    <em>$32.99</em>
                </div>
                <div class="sl-cart-footer__btn">
                    <a class="btn sl-btn" href="javascript:void(0);">Proceed To Checkout</a>
                </div>
            </div>
        </div>-->
    </div>
</div>
<div class="sl-user sl-userdropdown">
                <a href="javascript:void(0);">
                    <span class="sl-user__description"><em class="d-block">Welcome </em><?php echo $_SESSION['name'];?></span>
                    <i class="ti-angle-down"></i>
                </a>
                <ul class="sl-usermenu">
                    
                    <li class="menu-item-has-children page_item_has_children">
                        <a href="javascript:void(0);" class="sl-notification sl-noticolor1">
                            <i class="ti-star"></i><span>Manage Inquiry</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="list_of_inquiry.php?status=0">Pending</a></li>
                            <li><a href="list_of_inquiry.php?status=1">Success</a></li>
                            <li><a href="list_of_inquiry.php?status=2">Cancel/Reject</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="dashboard-profile-settings.html">
                            <i class="ti-user"></i><span>Profile</span>
                        </a>
                    </li>
                    <li class="menu-item-has-children page_item_has_children">
                        <a href="javascript:void(0);">
                            <i class="ti-layers"></i><span>Packages Status</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="package.php">Running Packages</a></li>
                            <li><a href="dashboard-all-payouts.html">Package History</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="dashboard-my-favorites.html">
                            <i class="ti-heart"></i><span>My Favorites</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="ti-key"></i><span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>