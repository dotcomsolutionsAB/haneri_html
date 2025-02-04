<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Haneri</title>
    <?php include("../inc_files/fav_icon_others.php"); ?>

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
        <header class="header header-transparent">
            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="index.php" class="logo">
                            <img src="images/Haneri Logo.png" alt="Porto Logo">
                        </a>
                        <div class="logo_div">
                            <a href="index.php" class="logos">
                                <img src="images/Haneri Logo.png" alt="Porto Logo">
                            </a>
                        </div>

                        <nav class="main-nav font2">
                            <ul class="menu">
                                <style>
                                    .menu .categoryy {
                                        left: -21.5vw !important;
                                        width: 100vw !important;
                                        min-width: 100vw;
                                        box-shadow: none;
                                        border: 0px solid #eee;
                                    }
                                    .hover{
                                        padding-top: 10px !important;
                                        width: 100% !important;
                                        background:#fff;
                                        padding: 20px 310px;
                                        justify-content: flex-start;
                                    }
                                    /* .hover a:hover {
                                        background: repeating-radial-gradient(#43d4eb, #dfdfdf 100px);
                                        border-radius: 50%;
                                    } */
                                    .hov{
                                        width: 150px;
                                        /* height:120px; */
                                        transition: background-color 0.3s ease, color 0.3s ease; /* Smooth hover effect */
                                    }
                                    .hov a{
                                        text-decoration: none; /* Remove underline */                            
                                    }
                                    .hov:hover {
                                        /* background-color:#f8f9fa; */
                                    }
                                    .category .img {
                                        width: 100%;
                                        height: 110px;
                                    }
                                    .img img{
                                        object-fit: contain !important;
                                    }
                                </style>
                                <li class="active">
                                    <a href="#">Categories</a>
                                    <div class="megamenu megamenu-fixed-width megamenu-3cols categoryy">
                                        <div class="row">
                                            <section class="categories hover">
                                                <a href="ceiling_fans.php">
                                                    <div class="category hov">
                                                        <div class="img">
                                                            <img src="images/Ceilimg Fan.png" alt="Ceiling Fan">
                                                        </div>
                                                        <div class="text">
                                                            <p>Ceiling Fan</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="category hov">
                                                        <div class="img">
                                                            <img src="images/Table Wall Pedestals.png" alt="Table Wall Pedestals">
                                                        </div>                
                                                        <div class="text">
                                                            <p>Table Wall Pedestals</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="category hov">
                                                        <div class="img">
                                                            <img src="images/Domestic Exhaust.png" alt="Domestic Exhaust">
                                                        </div>
                                                        <div class="text">
                                                            <p>Domestic Exhaust</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="category hov">
                                                        <div class="img">
                                                            <img src="images/Personal.png" alt="Personal">
                                                        </div>
                                                        <div class="text">
                                                            <p>Personal</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </section>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">Pillar Technololgy</a>
                                    <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <ul class="submenu">
                                                    <li><a href="air_curve_design.php">Air Curve Design</a></li>
                                                    <li><a href="turbosilent_bldc.php">TurboSilent BLDC</a></li>
                                                    <li><a href="mass.php">M.A.S.S®</a></li>
                                                    <li><a href="lumiambience.php">LumiAmbience</a></li>
                                                    <li><a href="scan.php">S.C.A.N</a></li>
                                                    <!-- <li><a href="product-custom-tab.html">WITH CUSTOM TAB</a></li>
                                                    <li><a href="product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
                                                    <li><a href="product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
                                                    <li><a href="product-addcart-sticky.html">ADD CART STICKY</a></li> -->
                                                </ul>
                                            </div><!-- End .col-lg-4 -->
                                        </div>
                                    </div>
                                </li>                        
                                <style>
                                    .description-link {
                                        /* font-size: 14px; */
                                        color:rgb(8, 9, 9); /* Link color */
                                        text-decoration: none;
                                        /* margin: 0 5px; */
                                        font-size: 14px;
                                        font-weight: 300;
                                    }

                                    .description-link:hover {
                                        text-decoration: underline;
                                    }
                                </style>
                                <li class="active">
                                    <a href="#">About Us</a>
                                    <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="submenu">
                                                    <li class="submenu-item">
                                                        <a href="our_story.php">Our Story</a>
                                                        <div class="submenu-description">
                                                            <a href="our_story.php#vision" class="description-link">VISION</a> |
                                                            <a href="our_story.php#mission" class="description-link"> MISSION</a> |
                                                            <a href="our_story.php#values" class="description-link"> VALUES</a>
                                                        </div>
                                                    </li>
                                                    <li class="submenu-item">
                                                        <a href="our_brands.php">Our Brands</a>
                                                        <div class="submenu-description">
                                                            <a href="our_brands.php#haner" class="description-link">Haner</a> |
                                                            <a href="our_brands.php#bespoke" class="description-link"> Bespoke</a> |
                                                            <a href="our_brands.php#professional" class="description-link"> Professional</a>
                                                        </div>
                                                    </li>
                                                    <li class="submenu-item">
                                                        <a href="capabilities.php">Capabilities</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="active">
                                    <a href="support.php">Support</a>
                                    <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <ul class="submenu">
                                                    <li>
                                                        <a href="support.php#Help">Product Help</a>
                                                        <div class="submenu-description">
                                                            <a href="support.php#FAQs" class="description-link">FAQs</a> |
                                                            <a href="support.php#Videos" class="description-link">Videos</a> |
                                                            <a href="support.php#Catalogues" class="description-link">Catalogues</a> |
                                                            <a href="support.php#Manuals" class="description-link">Manuals</a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="support.php#Enquiry">Corporate Enquiry</a>
                                                        <div class="submenu-description">
                                                            <a href="support.php#FORM" class="description-link">FORM</a> 
                                                        </div>
                                                    </li>
                                                    <li><a href="#">Contact Us</a></li>
                                                </ul>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <a href="#" class="header-icon header-icon-user" title="Login"><i
                                class="icon-user-2"></i></a> |  
                        <a href="#" class="header-icon"><i class="fab fa-whatsapp"></i></a> | 
                        <!-- <a href="wishlist.html" class="header-icon header-icon-wishlist" title="Wishlist"><i
                                class="icon-wishlist-2"></i></a> -->
                        <div class="header-search header-search-popup header-search-category d-none d-sm-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- End .header -->