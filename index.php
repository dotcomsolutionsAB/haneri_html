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
            <!-- Slider code -->
            <?php include("inc_files/slider.php"); ?>
            
            <!-- Featured_products code -->
            <section class="featured_products">
                <h2>Featured Products</h2>
                <div class="product-grid">
                    <div class="product">
                        <a href="#"><img src="images/f1.png" alt="Black Fan"></a>
                    </div>
                    <div class="product">
                        <a href="#"><img src="images/f2.png" alt="Wooden Fan"></a>
                    </div>
                    <div class="product">
                        <a href="#"><img src="images/f3.png" alt="White Fan"></a>
                    </div>
                    <div class="product">
                        <a href="#"><img src="images/f4.png" alt="Black Fan 2"></a>
                    </div>
                </div>
            </section>
            
            <!-- About_haneri code -->
            <?php include("inc_files/about_haneri.php"); ?>
            
            <!-- Why_choose_us code -->
            <?php include("inc_files/why_choose_us.php"); ?>

            <!-- Theme_category_section code -->
            

            <!-- Best_seller_section code -->
            <?php include("inc_files/best_seller_section.php"); ?>            

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
            
            <!-- Faq_question code -->
            <?php include("inc_files/faq_question.php"); ?>

            <!-- support_section code -->

            <!-- Blogs Section -->
            <section class="blogs_section">
                <h2>BLOGS</h2>
                <div class="blogs-container">
                    <div class="blog-item">
                        <img src="images/f15.png" alt="Blog Image 1">
                    </div>
                    <div class="blog-item">
                        <img src="images/f16.png" alt="Blog Image 2">
                    </div>
                    <div class="blog-item">
                        <img src="images/f17.png" alt="Blog Image 3">
                    </div>
                </div>
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
        <!-- Mobile_sidebar code -->
         <?php include("inc_files/mobile_sidebar.php"); ?>

    </div><!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <!-- Mobile sitky bottom nav -->
         <?php include("inc_files/mobile_sticky_bottom_nav.php"); ?>
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