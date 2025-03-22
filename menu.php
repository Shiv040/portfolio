<ul class="navbar-nav mr-auto sl-navbar-nav">
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    echo $current_page;
    ?>

    <li class="nav-item <?php echo ($current_page == 'index.php') ? 'sl-navactive' : ''; ?>">
        <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item sl-dropdown <?php echo ($current_page == 'vendors.php') ? 'sl-navactive' : ''; ?>">
        <a href="javascript:void(0);">Vendors</a>
        <ul class="sl-dropdown__menu">
            <?php
            $json = file_get_contents('http://localhost/utsav_hub/api/list_vendors_categories.php');
            $categories = json_decode($json, true);
            $i = 0;
            foreach ($categories as $category) {
            ?>
                <li class="menu-item-has-children page_item_has_children">
                    <a href="javascript:void(0);"><?php echo $category['category_name']; ?></a>
                    <ul class="sub-menu">
                        <?php
                        $services_json = file_get_contents('http://localhost/utsav_hub/api/list_vendor_wise_service.php?category_id=' . $category['category_id']);
                        $services = json_decode($services_json, true);
                        foreach ($services as $service) {
                        ?>
                            <li>
                                <a href="vendor_services.php?category_id=<?php echo $service['category_id']; ?>" title="<?php echo $service['service_name']; ?>"><?php echo $service['service_name']; ?></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            <?php
                $i++;
                if ($i == 5)
                    break;
            }
            ?>
            <li class="menu-item">
                <a href="vendors.php">View ALL</a>
            </li>
        </ul>
    </li>
    <li class="nav-item <?php echo ($current_page == 'vendor-single.html') ? 'sl-navactive' : ''; ?>">
        <a href="vendor-single.html">Vendor Products</a>
    </li>
    <li class="nav-item <?php echo ($current_page == 'contact.html') ? 'sl-navactive' : ''; ?>">
        <a class="nav-link" href="contact.php">Contact</a>
    </li>
</ul>