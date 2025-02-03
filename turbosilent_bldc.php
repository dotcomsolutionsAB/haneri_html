<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Turbosilent BLDC</title>
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
    <link rel="stylesheet" href="custom/benifits_section.css">
    <link rel="stylesheet" href="custom/custom.css">
    <link rel="stylesheet" href="custom/custom_styles.css">
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
                        <li class="breadcrumb-item active" aria-current="page">Pillar Technology</li>
                    </ol>
                </div><!-- End .container -->
            </nav>
            <!-- <div class="page-header pt-3 bg-transparent"> -->
            <div class="heading">
                <div class="containe text-left">
                    <h1 class="text-uppercase text-left page_heading heading1 light">TurboSilent BLDC Technology</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->

            <style>
               
            </style>

            <div class="containe wave-box">
                <div class="row row-bg ss">
                    <div class="col-md-12">
                        <p class="mb-2">
                        <!-- Wave background elements -->
                        <div class="wave1"></div>
                        <div class="wave2"></div>
                        <div class="wave3"></div>
                        <div class="wave4"></div>
                        <div class="content-container">
                            <h2 class="heading2 light">Introducing TurboSilent BLDC Technology: Unleashing Unmatched Power and Efficiency</h2>
                            <p class="paragraph1 light">
                            At Haneri, we redefine engineering excellence with our proprietary
                            <span class="highlight_p">TurboSilent BLDC Technology</span>. This advanced motor design not only delivers
                            higher torque and exceptional durability but also ensures unmatched energy efficiency,
                            setting a new benchmark for ceiling fan performance and contributing to a greener environment.
                            </p>
                            <p class="mb-2">
                            <h2 class="heading2 light">What is TurboSilent BLDC Technology?</h2>
                            <p class="paragraph1 light">
                            <span class="highlight_p">TurboSilent BLDC (Brushless Direct Current) Technology</span> is an in-house developed
                            motor system that employs high-tech electromagnetic and mechanical design principles. This
                            cutting-edge innovation enhances torque delivery, minimizes energy losses, and ensures extended
                            motor lifespan. TurboSilent motors are engineered to outperform conventional systems, offering
                            industry-leading reliability and precision that you can trust.
                            </p>
                        </div>
                    </div>
                </div><!-- End .row -->
            </div><!-- End .container -->
            
            <style>
              
            </style>
            <div class="container">                            
                <section id="turbosilent_bldc" class="turbosilent_bldc">
                    <?php include("inc_files/pillar_technology/turbosilent_bldc.php"); ?>
                </section>
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