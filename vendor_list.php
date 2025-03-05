<section class="sl-main-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8">
                <div class="sl-sectionHead">
                    <div class="sl-sectionHead__title sl-below-line sl-below-line__active">
                        <h2>List Of Vendors</h2>
                    </div>
                    <div class="sl-sectionHead__description">
                        <p>Explore our extensive list of vendors offering a wide range of services to meet your needs. Whether you're planning an event, looking for professional services, or seeking unique products, our vendors are here to help you with top-notch service and quality.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="sl-category sl-row">
            <?php
            $json = file_get_contents('http://localhost/utsav_hub/api/list_vendors_categories.php');
            $categories = json_decode($json, true);

            foreach ($categories as $category) {
                echo '<div class="sl-col sl-col-sm-1-of-2 sl-col-md-1-of-3 sl-col-lg-1-of-4 sl-col-xl-1-of-5">';
                echo '    <div class="sl-category__service">';
                echo '        <img src="utsav_hub/' . $category['category_image'] . '" alt="image Description" style="width: 100px; height: 100px;">';
                echo '        <div class="sl-category__description">';
                echo '            <h5>' . $category['category_name'] . '</h5>';
                echo '            <span>' . $category['vendor_count'] . ' Providers</span>';
                echo '        </div>';
                echo '        <a href="vendor_services.php?category_id=' . $category['category_id'] . '" class="sl-category__icon"><i class="ti-arrow-right"></i></a>';
                echo '    </div>';
                echo '</div>';
            }
            ?>

        </div>
    </div>
</section>