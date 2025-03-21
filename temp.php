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