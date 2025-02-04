<?php include("header.php"); ?>

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Men</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container mb-3 sect">
        <div class="row">
            <div class="col-lg-9 main-content">
                <div class="category-banner pt-0 pb-2">
                    <!-- Category banner code -->
                </div><!-- End .category-slide -->

                <!--Tool box code-->
                <?php include("inc_files/shop/toold_box.php"); ?>
                
                <div class="row">
                    <?php
                        for ($i = 0; $i < 10; $i++) {
                            echo '
                                <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="">
                                                <img src="images/place.jpg" width="273"
                                                    height="273" alt="productr" />
                                            </a>
                                            <!-- <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                                <div class="product-label label-sale">-20%</div>
                                            </div> -->
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="#" class="btn-quickview"
                                                title="Quick View">Quick
                                                View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="ceiling_fans.php" class="product-category">Celing Fans</a>
                                                </div>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="#">FENGSHUI</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="old-price">₨. 3299.00</span>
                                                <span class="product-price">₨. 2199.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    ?>
                    <!-- <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="">
                                    <img src="assets/images/demoes/demo3/products/product-2.jpg" width="273"
                                        height="273" alt="productr" />
                                    <img src="assets/images/demoes/demo3/products/product-2-2.jpg" width="273"
                                        height="273" alt="productr" />
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview"
                                    title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#" class="product-category">category</a>
                                    </div>
                                </div>
                                <h3 class="product-title">
                                    <a href="">Porto Transparent Images</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>

                
                <?php include("inc_files/shop/pagination_footer.php"); ?>
            </div><!-- End .main-content -->

            <div class="sidebar-overlay"></div>
            <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                <?php include("inc_files/shop/side_shop_filter.php"); ?>
            </aside>
        </div><!-- End .row -->
    </div><!-- End .container -->
</main><!-- End .main -->

<?php include("header.php"); ?>