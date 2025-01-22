<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>About Us</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/icons/favicon.png">

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
            font-family: 'Barlow Condensed', sans-serif;
        }
        #our-story {
            padding-top: 1rem;
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
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <section id="our-story">
                    <?php include("inc_files/about/our_story_section.php"); ?>
                </section>
                <br><br>
                <section id="our-brands">
                    <?php include("inc_files/about/our-brands.php"); ?>
                </section>
                <br><br>
                <style type="text/css" media="all">
    /* General Section Styling */
    .capabilities-section {
        padding: 60px 20px;
        text-align: center;
    }

    .section-title {
        font-size: 42px;
        font-weight: bold;
        margin-bottom: 40px;
        text-transform: uppercase;
    }

    /* Capability Rows */
    .capability-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
        gap: 30px;
        margin-bottom: 40px;
    }

    .capability-row.reverse {
        flex-direction: row-reverse;
    }

    .capability-content {
        flex: 1;
        max-width: 300px;
        text-align: left;
        padding: 20px 0;
    }

    .capability-content h2 {
        margin-bottom: 2.6rem;
        font-weight: 400;
        font-size: 22px;
    }

    .capability-content p,
    .capability-content ul {
        font-size: 14px;
        line-height: 22px;
        text-align: justify;
    }

    .capability-content ul {
        list-style-type: disc;
        margin-left: 20px;
    }

    .capability-content ul li {
        margin-bottom: 10px;
    }

    /* Capability Images */
    .capability-image {
        flex: 1;
        max-width: 300px;
    }

    .capability-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Conclusion */
    .capability-conclusion {
        font-size: 20px;
        font-weight: bold;
        margin-top: 40px;
        color: rgb(37, 108, 99);
    }

    .about .row.row-bg {
        display: flex;
        align-items: flex-start;
    }

    .about-slider {
        margin-bottom: 0;
    }

    .part_img {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<section id="capabilities" class="capabilities-section">
    <div class="container text-left">
        <h1 class="font4 text-uppercase about_section">CAPABILITIES</h1>
    </div>
    <div class="aab">
        <!-- Section 1: Excellence -->
        <div class="capability-row col-lg-6">
            <div class="capability-content">
                <h2 class="capability-title">Excellence in Manufacturing, R&D, and Innovation</h2>
                <p>
                    At Haneri, we seamlessly integrate design, innovation, and precision manufacturing, ensuring every product exemplifies quality, functionality, and elegance.
                </p>
            </div>
            <div class="capability-image">
                <img src="images/place.jpg" alt="Excellence in Manufacturing">
            </div>
        </div>

        <!-- Section 2: R&D -->
        <div class="capability-row reverse col-lg-6">
            <div class="capability-content">
                <h2 class="capability-title">Product-Specific R&D and Prototyping Facilities</h2>
                <p>
                    Innovation is at the heart of Haneri. Our dedicated research and development teams focus on creating products that redefine everyday living. With specialized facilities for product-specific R&D and rapid prototyping, we bring ideas to life with unparalleled speed and accuracy. This includes:
                </p>
                <ul>
                    <li>Advanced CFD laboratories for airflow and performance optimization</li>
                    <li>3D CAD modeling and simulation for precise design validation</li>
                    <li>In-house rapid prototyping capabilities for iterative design improvements</li>
                    <li>Dedicated teams for testing and validating new technologies</li>
                </ul>
            </div>
            <div class="capability-image">
                <img src="images/place.jpg" alt="R&D and Prototyping Facilities">
            </div>
        </div>

        <!-- Section 3: Manufacturing -->
        <div class="capability-row col-lg-6">
            <div class="capability-content">
                <h2 class="capability-title">Comprehensive Manufacturing Processes</h2>
                <p>
                    Our robust manufacturing capabilities allow us to oversee every aspect of production.
                </p>
                <ul>
                    <li>Injection Moulding</li>
                    <li>Sheet Metal Forming</li>
                    <li>Specialized assembly lines for FG and BLDC motors, including in-house BLDC magnet manufacturing</li>
                </ul>
            </div>
            <div class="capability-image">
                <img src="images/place.jpg" alt="Comprehensive Manufacturing">
            </div>
        </div>

        <!-- Section 4: Surface Finishing -->
        <div class="capability-row reverse col-lg-6">
            <div class="capability-content">
                <h2 class="capability-title">Superior Surface Finishing Capabilities</h2>
                <p>
                    Haneri’s advanced surface finishing ensures that every product meets the highest standards of aesthetics and longevity:
                </p>
                <ul>
                    <li>Electroplating, Chrome Finish on Plastics, PU Paint, and Powder Coating</li>
                    <li>Heat Transfer Printing, Hot Foiling, and Water Transfer Coating</li>
                </ul>
            </div>
            <div class="capability-image">
                <img src="images/place.jpg" alt="Surface Finishing Capabilities">
            </div>
        </div>

        <!-- Section 5: Tooling -->
        <div class="capability-row col-lg-6">
            <div class="capability-content">
                <h2 class="capability-title">Design & Tooling Expertise</h2>
                <p>
                    Our in-house tool room for mold manufacturing and sophisticated 3D CAD design capabilities empower us to innovate with precision. Every product benefits from our deep expertise in crafting tools and molds, ensuring seamless execution from concept to production.
                </p>
            </div>
            <div class="capability-image">
                <img src="images/place.jpg" alt="Design & Tooling Expertise">
            </div>
        </div>

        <p style="text-align: justify; margin-top: 20px;">
            With a relentless focus on R&D, superior manufacturing capabilities, and rigorous quality control, Haneri creates products that set a new benchmark in innovation, durability, and style. Accredited by leading national (ISO 9001:2019, IS 45001, IS 14001, BIS, and BEE) and international agencies, our labs and manufacturing facilities ensure compliance with the most stringent standards.
        </p>

        <h5 class="capability-conclusion">
            <strong>At Haneri, we don’t just make products—we craft experiences.</strong>
        </h5>
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