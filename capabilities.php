<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Capabilities</title>

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
            font-family: 'Barlow Condensed', sans-serif;
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
                        <li class="breadcrumb-item active" aria-current="page">Capabilities</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="containe text-left">
                <h1 class="font4 text-uppercase about_section">CAPABILITIES</h1>
            </div>
            <div class="container">                
                <style type="text/css" media="all">
                    /* General Section Styling */
                    .capabilities-section {
                        padding: 20px 0px;
                        text-align: center;
                    }

                    .section-title {
                        font-size: 42px;
                        font-weight: bold;
                        margin-bottom: 40px;
                        text-transform: uppercase;
                    }

                    /* Capability Rows */
                    .row-container {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                        gap: 30px;
                        margin-bottom: 40px;
                    }

                    .capability-row {
                        display: flex;
                        flex-direction: row;
                        flex: 1;
                        gap: 20px;
                        align-items: flex-start;
                        max-width: calc(50% - 15px); /* Each capability-row takes 50% width minus gap */
                    }

                    .capability-row.reverse {
                        flex-direction: row-reverse;
                    }

                    .capability-content {
                        flex: 1;
                        max-width: 400px;
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
                        font-size: 18px;
                        line-height: 22px;
                        text-align: justify;
                        font-family: 'Barlow Condensed';
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
                        max-width: 200px;
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
                </style>
                <section id="capabilities" class="capabilities-section">
                    <?php include("inc_files/about/capabilities_section.php"); ?>
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