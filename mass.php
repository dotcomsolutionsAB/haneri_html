<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>M.A.S.S*</title>
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
                        <li class="breadcrumb-item"><a href="demo3.html">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">Pillar Technology</a></li> -->
                        <li class="breadcrumb-item active" aria-current="page">M.A.S.S</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container"> 
                <style type="text/css" media="all">
                    /* General Section Styling */
                    .brands-section {
                        padding: 50px 20px;
                        /* background-color: #f9f9f9; */
                        text-align: center;
                    }
                    .mass {
                        padding: 20px 20px;
                        padding-top: 1rem;
                    }
                    /* .brands-section .section-title {
                        font-size: 36px;
                        font-weight: bold;
                        margin-bottom: 40px;
                        text-transform: uppercase;
                        color: #333;
                    } */

                    /* Brand Rows */
                    .brand-row-container {
                        margin-bottom: 0px;
                        padding: 20px 0px;
                        /* border: 1px solid #ddd; */
                        border-radius: 10px;
                        background-color: #fff;
                    }

                    .brand-row {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                        gap: 20px;
                    }

                    .brand-row.reverse {
                        flex-direction: row-reverse;
                    }

                    .brand-content {
                        flex: 1;
                        max-width: 70%;
                        text-align: left;
                        padding: 10px;
                        text-align: justify;
                    }
                    .brand-content h2, .head h2{
                        font-weight: 400;
                        margin-bottom: 1.2rem;
                    }
                    .head p {
                        font-size: 18px;
                        color: #222;
                        font-family: 'Barlow Condensed';
                    }
                    .brand-content p {
                        font-size: 18px;
                        line-height: 24px;
                        text-align: justify;
                        color: #555;
                        font-family: 'Barlow Condensed';
                    }
                    .brand-content li{
                        font-size: 18px;
                        color: #222;
                        font-family: 'Barlow Condensed';
                    }
                    .brand-content strong {
                        font-weight: 600;
                        font-size: 18px;
                    }

                    .brand-image {
                        flex: 1;
                        max-width: 30%;
                        display: flex;
                        align-items: flex-start;
                        justify-content: center;
                        padding-top: 15px;
                    }

                    .brand-image img {
                        width: 100%;
                        max-width: 500px;
                        height: auto;
                        object-fit: contain;
                        border-radius: 0px;
                        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                    }
                </style>                          
                <section id="mass" class="mass">
                    <?php include("test.php"); ?>
                </section>
            </div>
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