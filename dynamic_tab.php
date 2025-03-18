<div class="col-lg-8 col-xl-9">
    <div class="sl-tab">
        <nav class="nav">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-productDescription-tab" data-toggle="tab" href="#nav-productDescription" role="tab" aria-controls="nav-productDescription" aria-selected="true">Product Description</a>
                <a class="nav-item nav-link" id="nav-faqs-tab" data-toggle="tab" href="#nav-faqs" role="tab" aria-controls="nav-faqs" aria-selected="true">Policys</a>
                <a class="nav-item nav-link" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-reviews" aria-selected="true">Reviews</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-productDescription" role="tabpanel" aria-labelledby="nav-productDescription-tab">
                <?php include("tab_product_description.php"); ?>
            </div>
            <div class="tab-pane fade" id="nav-faqs" role="tabpanel" aria-labelledby="nav-faqs-tab">
                <?php include("tab_faqs.php"); ?>
            </div>
            <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                <?php include("tab_reviews.php"); ?>
            </div>
        </div>
    </div>
</div>