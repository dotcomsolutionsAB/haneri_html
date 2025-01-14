<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Haneri</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.png">

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
    <link rel="stylesheet" type="text/css" href="assets/vendor/simple-line-icons/css/simple-line-icons.min.css">

    <!-- Custom -->
     <link rel="stylesheet" href="custom/custom.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;700&family=Open+Sans:wght@400;700&family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="custom/responsive.css">
</head>

<body class="full-screen-slider">
    <div class="page-wrapper">
        <?php include("inc_files/header.php"); ?>

        <?php include("inc_files/category_section.php"); ?>
                
        <main class="main">
            <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big">
                <div class="home-slide home-slide1 banner d-flex align-items-center">
                    <img class="slide-bg" src="images/Slider1.jpg"
                        style="background-color: #ecc;" alt="home banner">
                    <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                        <!-- <h2>Winter Fashion Trends</h2>
                        <h3 class="text-uppercase mb-0">Get up to 30% off</h3> -->
                        <h1><strong>A true</strong><br><span> revolution</span></h1>

                        <!-- <h5 class="text-uppercase">Starting at<span
                                class="coupon-sale-text"><sup>$</sup>199<sup>99</sup></span></h5> -->
                        <a href="demo3-shop.html" class="btn btn-dark slider_btn btn-xl" role="button">Shop Now</a>
                    </div><!-- End .banner-layer -->
                </div><!-- End .home-slide -->

                <!-- <div class="home-slide home-slide2 banner d-flex align-items-center">
                    <img class="slide-bg" src="assets/images/demoes/demo3/slider/slide2.jpg"
                        style="background-color: #bfcec9;" alt="home banner">
                    <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                        <h2>New Season Hats </h2>
                        <h3 class="text-uppercase rotated-upto-text mb-0"><small>Up to</small>20% off</h3>

                        <hr class="short-thick-divider mb-sm-0 mb-1">

                        <h5 class="text-uppercase d-inline-block mb-2 mb-sm-0">Starting at <span>$<em>19</em>99</span>
                        </h5>
                        <a href="demo3-shop.html" class="btn btn-dark btn-xl btn-icon-right" role="button">Shop Now <i
                                class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div> -->
            </div><!-- End .home-slider -->

            <section class="container">
                <h2 class="section-title ls-n-15 text-center pt-2 m-b-4">Featured Products</h2>

                <div class="owl-carousel owl-theme nav-image-center show-nav-hover nav-outer cats-slider appear-animate"
                    data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000">
                    <div class="product-category">
                        <a href="#">
                            <figure>
                                <img src="images/f1.png" width="273" height="273"
                                    alt="category" />
                            </figure>
                            <!-- <div class="category-content">
                                <h3>Sunglasses</h3>
                                <span><mark class="count">8</mark> products</span>
                            </div> -->
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="#">
                            <figure>
                                <img src="images/f2.png" width="273" height="273"
                                    alt="category" />
                            </figure>
                            <!-- <div class="category-content">
                                <h3>Bags</h3>
                                <span><mark class="count">4</mark> products</span>
                            </div> -->
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="#">
                            <figure>
                                <img src="images/f3.png" width="273" height="273"
                                    alt="category" />
                            </figure>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="#">
                            <figure>
                                <img src="images/f4.png" width="273" height="273"
                                    alt="category" />
                            </figure>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="#">
                            <figure>
                                <img src="images/f5.png" width="273" height="273"
                                    alt="category" />
                            </figure>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="#">
                            <figure>
                                <img src="images/f6.png" width="273" height="273"
                                    alt="category" />
                            </figure>
                        </a>
                    </div>
                </div>
            </section>

            <section class="about-haneri">
                <div class="about-content">
                    <div class="about-image">
                        <!-- Replace this placeholder with the actual image -->
                        <img src="haneri-placeholder.jpg" alt="Haneri Image">
                    </div>
                    <div class="about-text">
                        <div class="q_head">
                            <h3>What is</h3>
                            <p><span>HANERI?</span></p>
                        </div>                    
                        <div class="q_answer">
                            <p>
                                Haneri is the brainchild of a passionate team with over 75 years of collective experience in the consumer durable industry.
                                With expertise spanning product creation, innovation, engineering, and manufacturing, we envisioned Haneri as a brand
                                that caters to consumers seeking products that seamlessly blend with modern living. At Haneri, our mission is to inspire
                                everyday life by offering thoughtfully designed, functional, and future-ready solutions.
                            </p>
                            <p>
                                Our founding team is a diverse mix of individuals across different age groups and backgrounds, reflecting the aspirations
                                of today’s consumers and those of the future. Together, we aim to redefine the experience with products that resonate with
                                evolving lifestyles, delivering value and inspiration in every interaction. Haneri seeks to create solutions for all your
                                needs, including home, office, and commercial spaces.
                            </p>
                            <button class="btn-know-more">KNOW MORE</button>
                        </div>                    
                    </div>
                </div>
            </section>

            <section class="why-choose-us">
                <h2>Why choose us</h2>
                <div class="icons-container">
                    <div class="icon-item">
                        <img src="images/Logo1.png" alt="Quality">
                    </div>
                    <div class="icon-item">
                        <img src="images/Logo2.png" alt="Innovation">
                    </div>
                    <div class="icon-item">
                        <img src="images/Logo3.png" alt="Customer Focus">
                    </div>
                </div>
            </section>

            <section class="bg-gray banners-section text-center">
                <div class="container py-2">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInLeftShorter"
                            data-animation-delay="100" data-animation-duration="1000">
                            <div class="home-banner banner banner-sm-vw mb-2">
                                <img src="assets/images/demoes/demo3/banners/home-banner1.jpg"
                                    style="background-color: #ccc;" width="419" height="629" alt="Banner" />
                                <div class="banner-layer banner-layer-bottom text-left">
                                    <h3 class="m-b-2">Sunglasses Sale</h3>
                                    <h4 class="m-b-3">See all and find yours</h4>
                                    <a href="demo3-shop.html" class="btn  btn-dark" role="button">Shop By Glasses</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInLeftShorter"
                            data-animation-delay="300" data-animation-duration="1000">
                            <div class="home-banner banner banner-sm-vw mb-2">
                                <img src="assets/images/demoes/demo3/banners/home-banner2.jpg"
                                    style="background-color: #ccc;" width="419" height="629" alt="Banner" />
                                <div class="banner-layer banner-layer-top ">
                                    <h3 class="mb-0">Cosmetics Trends</h3>
                                    <h4 class="m-b-4">Browse in all our categories</h4>
                                    <a href="demo3-shop.html" class="btn  btn-dark" role="button">Shop By Glasses</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInLeftShorter"
                            data-animation-delay="500" data-animation-duration="1000">
                            <div class="home-banner banner banner-sm-vw mb-2">
                                <img src="assets/images/demoes/demo3/banners/home-banner3.jpg"
                                    style="background-color: #444;" width="419" height="629" alt="Banner" />
                                <div class="banner-layer banner-layer-middle">
                                    <h3 class="text-white m-b-1">Fashion Summer Sale</h3>
                                    <h4 class="text-white m-b-4">Browse in all our categories</h4>
                                    <a href="demo3-shop.html" class="btn btn-light bg-white" role="button">Shop By
                                        Fashion</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInLeftShorter"
                            data-animation-delay="700" data-animation-duration="1000">
                            <div class="home-banner banner banner-sm-vw mb-2">
                                <img src="assets/images/demoes/demo3/banners/home-banner4.jpg"
                                    style="background-color: #ccc;" width="419" height="629" alt="Banner" />
                                <div class="banner-layer banner-layer-bottom banner-layer-boxed">
                                    <h3 class="m-b-2">UP TO 70% IN ALL BAGS</h3>
                                    <h4>Starting at $99</h4>
                                    <a href="demo3-shop.html" class="btn  btn-dark" role="button">Shop By Bags</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container pb-3 mb-1">
                <h2 class="section-title ls-n-15 text-center pb-2 m-b-4">Best Sellers</h2>

                <div class="row py-4">
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="demo3-product.html">
                                    <img src="images/f5.png" width="273"
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
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <!-- <div class="product-details">
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
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="demo3-product.html">
                                    <img src="images/f6.png" width="273"
                                        height="273" alt="productr" />
                                    <img src="images/f6.png" width="273"
                                        height="273" alt="productr" />
                                </a>
                                <!-- <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div> -->
                                <div class="btn-icon-group">
                                    <a href="demo3-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <!-- <div class="product-details">
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
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="demo3-product.html">
                                    <img src="images/f13.png" width="273"
                                        height="273" alt="productr" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="demo3-product.html">
                                    <img src="images/f8.png" width="273"
                                        height="273" alt="productr" />
                                    <!-- <img src="assets/images/demoes/demo3/products/product-4-2.jpg" width="273"
                                        height="273" alt="productr" /> -->
                                </a>
                                <div class="btn-icon-group">
                                    <a href="demo3-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>                            
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="demo3-product.html">
                                    <img src="images/f9.png" width="273"
                                        height="273" alt="productr" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="demo3-product.html">
                                    <img src="images/f10.png" width="273"
                                        height="273" alt="productr" />
                                    <!-- <img src="assets/images/demoes/demo3/products/product-6-2.jpg" width="273"
                                        height="273" alt="productr" /> -->
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="demo3-product.html">
                                    <img src="images/f11.png" width="273"
                                        height="273" alt="productr" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="demo3-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="demo3-product.html">
                                    <img src="images/f12.png" width="273"
                                        height="273" alt="productr" />
                                    <!-- <img src="assets/images/demoes/demo3/products/product-8-2.jpg" width="273"
                                        height="273" alt="productr" /> -->
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>                            
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="demo3-product.html">
                                    <img src="images/f13.png" width="273"
                                        height="273" alt="productr" />
                                    <!-- <img src="assets/images/demoes/demo3/products/product-9-2.jpg" width="273"
                                        height="273" alt="productr" /> -->
                                </a>
                                <div class="btn-icon-group">
                                    <a href="demo3-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="demo3-product.html">
                                    <img src="images/f11.png" width="273"
                                        height="273" alt="productr" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="demo3-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="demo3-product.html">
                                    <img src="images/f12.png" width="273"
                                        height="273" alt="productr" />
                                    <!-- <img src="assets/images/demoes/demo3/products/product-8-2.jpg" width="273"
                                        height="273" alt="productr" /> -->
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>                            
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-xl-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="demo3-product.html">
                                    <img src="images/f13.png" width="273"
                                        height="273" alt="productr" />
                                    <!-- <img src="assets/images/demoes/demo3/products/product-9-2.jpg" width="273"
                                        height="273" alt="productr" /> -->
                                </a>
                                <div class="btn-icon-group">
                                    <a href="demo3-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                        </div>
                    </div>
                </div>
            </section>

            <hr class="mt-3 mb-6">

            <section class="haneri-bespoke">
                <div class="bespoke-content">
                    <div class="bespoke-text">
                        <h1>HANERI <br><span>BESPOKE</span></h1>
                    </div>
                    <div class="bespoke-image">
                        <img src="images/Haneri_Website_Wireframe_V1.1.png" alt="Crafting Image">
                    </div>
                </div>
            </section>

            <hr class="mt-3 mb-6">
            
            <section class="faq-get-in-touch">
                <div class="faq-section">
                    <h3>FAQs</h3>
                    <ul class="faq-list">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="get-in-touch">
                    <h3>GET IN TOUCH</h3>
                    <div class="contact-form">
                        <!-- Replace with your actual form if needed -->
                    </div>
                </div>
            </section>
            
            <section class="container pb-3 mb-1">
                <div class="row feature-boxes-container pt-2">
                    <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInRightShorter"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="sicon-earphones-alt"></i>

                            <div class="feature-box-content p-0">
                                <h3 class="text-uppercase">Customer Support</h3>
                                <h5>Need Assistence?</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna,
                                    et dapibus lacus. Lorem ipsum dolor sit amet.</p>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInRightShorter"
                        data-animation-delay="100" data-animation-duration="1000">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="sicon-credit-card"></i>

                            <div class="feature-box-content p-0">
                                <h3 class="text-uppercase">Secured Payment</h3>
                                <h5>Safe & Fast</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna,
                                    et dapibus lacus. Lorem ipsum dolor sit amet.</p>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInLeftShorter"
                        data-animation-delay="100" data-animation-duration="1000">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="sicon-action-undo"></i>

                            <div class="feature-box-content p-0">
                                <h3 class="text-uppercase">Free Returns</h3>
                                <h5>Easy & Free</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna,
                                    et dapibus lacus. Lorem ipsum dolor sit amet.</p>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInLeftShorter"
                        data-animation-delay="300" data-animation-duration="1000">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="icon-shipping"></i>

                            <div class="feature-box-content p-0">
                                <h3 class="text-uppercase">Free Shipping</h3>
                                <h5>Orders Over $99</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna,
                                    et dapibus lacus. Lorem ipsum dolor sit amet.</p>
                            </div><!-- End .feature-box-content -->
                        </div><!-- End .feature-box -->
                    </div><!-- End .col-lg-3 -->
                </div><!-- End .row .feature-boxes-container-->
            </section>

        </main><!-- End .main -->

        <?php include("inc_files/footer.php"); ?>
    </div><!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="demo3.html">Home</a></li>
                    <li>
                        <a href="demo3-shop.html">Categories</a>
                        <ul>
                            <li><a href="category.html">Full Width Banner</a></li>
                            <li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
                            <li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
                            <li><a href="category-sidebar-left.html">Left Sidebar</a></li>
                            <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                            <li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
                            <li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
                            <li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
                            <li><a href="#">List Types</a></li>
                            <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll<span
                                        class="tip tip-new">New</span></a></li>
                            <li><a href="category.html">3 Columns Products</a></li>
                            <li><a href="category-4col.html">4 Columns Products</a></li>
                            <li><a href="category-5col.html">5 Columns Products</a></li>
                            <li><a href="category-6col.html">6 Columns Products</a></li>
                            <li><a href="category-7col.html">7 Columns Products</a></li>
                            <li><a href="category-8col.html">8 Columns Products</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="demo3-product.html">Products</a>
                        <ul>
                            <li>
                                <a href="#" class="nolink">PRODUCT PAGES</a>
                                <ul>
                                    <li><a href="product.html">SIMPLE PRODUCT</a></li>
                                    <li><a href="product-variable.html">VARIABLE PRODUCT</a></li>
                                    <li><a href="product.html">SALE PRODUCT</a></li>
                                    <li><a href="product.html">FEATURED & ON SALE</a></li>
                                    <li><a href="product-sticky-info.html">WIDTH CUSTOM TAB</a></li>
                                    <li><a href="product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
                                    <li><a href="product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
                                    <li><a href="product-addcart-sticky.html">ADD CART STICKY</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                                <ul>
                                    <li><a href="product-extended-layout.html">EXTENDED LAYOUT</a></li>
                                    <li><a href="product-grid-layout.html">GRID IMAGE</a></li>
                                    <li><a href="product-full-width.html">FULL WIDTH LAYOUT</a></li>
                                    <li><a href="product-sticky-info.html">STICKY INFO</a></li>
                                    <li><a href="product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
                                    <li><a href="product-transparent-image.html">TRANSPARENT IMAGE</a></li>
                                    <li><a href="product-center-vertical.html">CENTER VERTICAL</a></li>
                                    <li><a href="#">BUILD YOUR OWN</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                        <ul>
                            <li>
                                <a href="wishlist.html">Wishlist</a>
                            </li>
                            <li>
                                <a href="cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="checkout.html">Checkout</a>
                            </li>
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="login.html">Login</a>
                            </li>
                            <li>
                                <a href="forgot-password.html">Forgot Password</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a></li>
                    <li>
                        <a href="#">Elements</a>
                        <ul class="custom-scrollbar">
                            <li><a href="element-accordions.html">Accordion</a></li>
                            <li><a href="element-alerts.html">Alerts</a></li>
                            <li><a href="element-animations.html">Animations</a></li>
                            <li><a href="element-banners.html">Banners</a></li>
                            <li><a href="element-buttons.html">Buttons</a></li>
                            <li><a href="element-call-to-action.html">Call to Action</a></li>
                            <li><a href="element-countdown.html">Count Down</a></li>
                            <li><a href="element-counters.html">Counters</a></li>
                            <li><a href="element-headings.html">Headings</a></li>
                            <li><a href="element-icons.html">Icons</a></li>
                            <li><a href="element-info-box.html">Info box</a></li>
                            <li><a href="element-posts.html">Posts</a></li>
                            <li><a href="element-products.html">Products</a></li>
                            <li><a href="element-product-categories.html">Product Categories</a></li>
                            <li><a href="element-tabs.html">Tabs</a></li>
                            <li><a href="element-testimonial.html">Testimonials</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="mobile-menu mt-2 mb-2">
                    <li class="border-0">
                        <a href="#">
                            Special Offer!
                        </a>
                    </li>
                    <li class="border-0">
                        <a href="https://1.envato.market/DdLk5" target="_blank">
                            Buy Porto!
                            <span class="tip tip-hot">Hot</span>
                        </a>
                    </li>
                </ul>

                <ul class="mobile-menu">
                    <li><a href="login.html">My Account</a></li>
                    <li><a href="demo3-contact.html">Contact Us</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="wishlist.html">My Wishlist</a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="login.html" class="login-link">Log In</a></li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <form class="search-wrapper mb-2" action="#">
                <input type="text" class="form-control mb-0" placeholder="Search..." required />
                <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
            </form>

            <div class="social-icons">
                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
                </a>
                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
                </a>
                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
                </a>
            </div>
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="demo3.html">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="demo3-shop.html" class="">
                <i class="icon-bars"></i>Categories
            </a>
        </div>
        <div class="sticky-info">
            <a href="wishlist.html" class="">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="login.html" class="">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="cart.html" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">3</span>
                </i>Cart
            </a>
        </div>
    </div>

    <!-- <div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form"
        style="background: #f1f1f1 no-repeat center/cover url(assets/images/newsletter_popup_bg.jpg)">
        <div class="newsletter-popup-content">
            <img src="assets/images/logo-black.png" alt="Logo" class="logo-newsletter" width="111" height="44">
            <h2>Subscribe to newsletter</h2>

            <p>
                Subscribe to the Porto mailing list to receive updates on new
                arrivals, special offers and our promotions.
            </p>

            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email"
                        placeholder="Your email address" required />
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
            </form>
            <div class="newsletter-subscribe">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                    <label for="show-again" class="custom-control-label">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div>

        <button title="Close (Esc)" type="button" class="mfp-close">
            ×
        </button>
    </div> -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
</body>

</html>