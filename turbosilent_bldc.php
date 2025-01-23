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
    <link rel="stylesheet" href="custom/custom.css">
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
                        <li class="breadcrumb-item active" aria-current="page">Pillar Technology</li>
                    </ol>
                </div><!-- End .container -->
            </nav>
            <style>
                .about p {
                    font-family: 'Barlow Condensed';
                    font-size: 18px;
                    color: #222529;
                }
                .turbosilent_bldc {
                    padding: 20px 20px;
                    padding-top: 1rem;
                }
                .containe h2{
                    font-weight: 400;
                }
                .contents ul{
                    list-style-type: auto;
                    margin-left: 20px;
                    font-size: 18px;
                    /* line-height: 22px; */
                    text-align: justify;
                    font-family: 'Barlow Condensed';
                    color: #222529;
                }    
                .contents ul li{
                    margin-bottom: 15px;
                }
                strong{
                    font-weight: 600;
                    font-size: larger;
                }
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