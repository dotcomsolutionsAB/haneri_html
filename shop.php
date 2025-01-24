<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Haneri - Shop</title>

    <?php include("inc_files/fav_icon_others.php"); ?>

    <script>
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/demo3.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="custom/responsive.css">
    <link rel="stylesheet" href="custom/custom.css">
</head>

<body>
    <div class="page-wrapper">
        <header class="header header-transparent">
            <?php include("inc_files/header.php"); ?>
        </header><!-- End .header -->

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Men</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">Electronics</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container mb-3">
                <div class="row">
                    <div class="col-lg-9 main-content">
                        <div class="category-banner pt-0 pb-2">
                            <!-- Category banner code -->
                        </div><!-- End .category-slide -->

                        <!--Tool box code-->
                        <?php include("inc_files/shop/tool_box.php"); ?>
                        
                        <div class="row">
                            
                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="demo3-product.html">
                                            <img src="assets/images/demoes/demo3/products/product-1.jpg" width="273"
                                                height="273" alt="productr" />
                                        </a>
                                        <div class="label-group">
                                            <div class="product-label label-hot">HOT</div>
                                            <div class="product-label label-sale">-20%</div>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo3-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="demo3-product.html">Women Shoes</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$59.00</span>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="demo3-product.html">
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
                                            <a href="demo3-product.html" class="btn-icon btn-add-cart"><i
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
                                                <a href="demo3-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="demo3-product.html">Porto Transparent Images</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$59.00</span>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="demo3-product.html">
                                            <img src="assets/images/demoes/demo3/products/product-3.jpg" width="273"
                                                height="273" alt="productr" />
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo3-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="demo3-product.html">Ideapad</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$59.00</span>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="demo3-product.html">
                                            <img src="assets/images/demoes/demo3/products/product-4.jpg" width="273"
                                                height="273" alt="productr" />
                                            <img src="assets/images/demoes/demo3/products/product-4-2.jpg" width="273"
                                                height="273" alt="productr" />
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="demo3-product.html" class="btn-icon btn-add-cart"><i
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
                                                <a href="demo3-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="demo3-product.html">Black Men Shoes</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$59.00</span>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="demo3-product.html">
                                            <img src="assets/images/demoes/demo3/products/product-5.jpg" width="273"
                                                height="273" alt="productr" />
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo3-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="demo3-product.html">Watch</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$59.00</span>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="demo3-product.html">
                                            <img src="assets/images/demoes/demo3/products/product-6.jpg" width="273"
                                                height="273" alt="productr" />
                                            <img src="assets/images/demoes/demo3/products/product-6-2.jpg" width="273"
                                                height="273" alt="productr" />
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-hot">HOT</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo3-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="demo3-product.html">Woman Dress</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$59.00</span>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="demo3-product.html">
                                            <img src="assets/images/demoes/demo3/products/product-7.jpg" width="273"
                                                height="273" alt="productr" />
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="demo3-product.html" class="btn-icon btn-add-cart"><i
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
                                                <a href="demo3-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="demo3-product.html">Black Bag</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$59.00</span>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="demo3-product.html">
                                            <img src="assets/images/demoes/demo3/products/product-8.jpg" width="273"
                                                height="273" alt="productr" />
                                            <img src="assets/images/demoes/demo3/products/product-8-2.jpg" width="273"
                                                height="273" alt="productr" />
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo3-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="demo3-product.html">Porto Both Sticky Info</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$59.00</span>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="demo3-product.html">
                                            <img src="assets/images/demoes/demo3/products/product-9.jpg" width="273"
                                                height="273" alt="productr" />
                                            <img src="assets/images/demoes/demo3/products/product-9-2.jpg" width="273"
                                                height="273" alt="productr" />
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="demo3-product.html" class="btn-icon btn-add-cart"><i
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
                                                <a href="demo3-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="demo3-product.html">Glasses</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$59.00</span>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>

                            <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="demo3-product.html">
                                            <img src="assets/images/demoes/demo3/products/product-10.jpg" width="273"
                                                height="273" alt="productr" />
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="demo3-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="demo3-product.html">Black Men Coat</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$59.00</span>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                        </div>

                        
                        <?php include("inc_files/shop/pagination_footer.php"); ?>
                    </div><!-- End .main-content -->

                    <div class="sidebar-overlay"></div>
                    <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                        <?php include("inc_files/shop/shop_filter.php"); ?>
                    </aside>
                </div><!-- End .row -->
            </div><!-- End .container -->
        </main><!-- End .main -->

        <?php include("inc_files/footer.php"); ?>
    </div><!-- End .page-wrapper -->

    <div class="loading-overlay">
        <?php include("inc_files/loading.php"); ?>
    </div>

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <!-- Mobile_sidebar code -->
        <?php include("inc_files/mobile_sidebar.php"); ?>
    </div><!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <!-- Mobile sitky bottom nav -->
        <?php include("inc_files/mobile_sticky_bottom_nav.php"); ?>
    </div>

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/nouislider.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
</body>

</html>