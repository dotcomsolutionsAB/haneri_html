<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Haneri - Shipping Policy</title>
    <?php include("inc_files/fav_icon_others.php"); ?>
    <script>
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700', 'Shadows+Into+Light:400', 'Segoe+Script:300,400,500,600' ] }
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
    <link rel="stylesheet" type="text/css" href="assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="custom/responsive.css">
    <link rel="stylesheet" href="custom/custom.css">
    <style>
        .page-header {
            padding: 1rem 0 3.2rem;
            margin-top: 0px;
        }
        .banner-layer h1 {
            font-size: 80px;
            color: #fff;
            font-family: Poppins,sans-serif;
        }
        .owl-dots{
            display:none;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <header class="header header-transparent">
            <?php include("inc_files/header.php"); ?>
        </header><!-- End .header -->

        <main class="main about">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Pillar Technology</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">Shipping Policy</li>
                    </ol>
                </div><!-- End .container -->
            </nav>
<style>
    /* Main Heading Style */
    .about_section {
        color: #fff; /* White text color */
        padding: 5px 65px; /* Spacing inside the heading */
        position: relative; /* Enable pseudo-elements */
        display: inline-block; /* Allow background to wrap the text */
        background: linear-gradient(135deg, #047f89, #315859);
        border-radius: 0px; /* Rounded corners */
        overflow: hidden; /* Prevent overflow of child elements */
        width:100%;
    }

    /* Geometric Decorative Element */
     .about_section::before {
        content: '';
        position: absolute;
        top: -20px;
        left: -10px;
        width: 260px;
        height: 170px;
        background: #f4f4f42e;
        transform: rotate(45deg);
        z-index: 100;
    }

    .about_section::after {
        content: '';
        position: absolute;
        bottom: -10px;
        right: -15px;
        width: 230px;
        height: 150px;
        background: #dfdfdf;
        transform: rotate(45deg);
        z-index: 1;
    }

    /* Text Layer */
    .about_section span {
        position: relative; /* Ensure text is above pseudo-elements */
        z-index: 2; /* Bring text to the front */
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .about_section {
            font-size: 2.5rem; /* Adjust font size for smaller screens */
            padding: 15px 20px; /* Reduce padding */
        }
    }

</style>
            <div class="heading">
                <div class="containe text-left">
                    <h1 class="text-uppercase text-left about_section">Shipping Policy</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <div class="container">                
                <div id="shipping_policy" class="shipping_policy">
                    <?php include("inc_files/policy/shipping_policy.php"); ?>
                </div>
            </div>
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
    </div>

    <div class="sticky-navbar">
        <!-- Mobile sitky bottom nav -->
        <?php include("inc_files/mobile_sticky_bottom_nav.php"); ?>
    </div>

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
</body>

</html>