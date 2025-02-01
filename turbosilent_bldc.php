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
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
                    padding: 20px 0px;
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
                .owl-dots{
                    display:none;
                }
            </style>
            <!-- <div class="page-header pt-3 bg-transparent"> -->
            <div class="heading">
                <div class="containe text-left">
                    <h1 class="text-uppercase text-left about_section">TurboSilent BLDC Technology</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <br><br>
            <style>
    .wave-box {
      overflow-x: hidden;
      background: linear-gradient(135deg, #00473E, #011d19, #64f4e0);
      background-size: 200% 200%;
      animation: bgFlow 10s ease-in-out infinite;
      position: relative;
      color: #fff;
      overflow-x: hidden;
      overflow-y: hidden;
    }

    .row-bg .ss{
        width: 100%;
        height: 95vh;
    }

    /* Gentle background gradient flow */
    @keyframes bgFlow {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }

    /* FIRST WAVE */
    .wave1 {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 200%;
      height: 15vh;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 100% 100% 0 0;
      animation: wave1Move 6s infinite linear;
      transform: translateX(0);
      z-index: 1;
    }

    @keyframes wave1Move {
      0% {
        transform: translateX(-50%) translateY(0);
      }
      50% {
        transform: translateX(-45%) translateY(5px);
      }
      100% {
        transform: translateX(-50%) translateY(0);
      }
    }

    /* SECOND WAVE */
    .wave2 {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 200%;
      height: 20vh;
      background: rgba(255, 255, 255, 0.15);
      border-radius: 100% 100% 0 0;
      animation: wave2Move 8s infinite ease-in-out;
      transform: translateX(-25%);
      z-index: 2;
    }

    @keyframes wave2Move {
      0% {
        transform: translateX(-25%) translateY(0);
      }
      50% {
        transform: translateX(-20%) translateY(10px);
      }
      100% {
        transform: translateX(-25%) translateY(0);
      }
    }

    /* THIRD WAVE */
    .wave3 {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 200%;
      height: 25vh;
      background: rgba(255, 255, 255, 0.25);
      border-radius: 100% 100% 0 0;
      animation: wave3Move 10s infinite linear;
      transform: translateX(-50%);
      z-index: 3;
    }

    @keyframes wave3Move {
      0% {
        transform: translateX(-50%) translateY(0);
      }
      50% {
        transform: translateX(-45%) translateY(10px);
      }
      100% {
        transform: translateX(-50%) translateY(0);
      }
    }

    /* FOURTH WAVE */
    .wave4 {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 200%;
      height: 30vh;
      background: rgba(255, 255, 255, 0.35);
      border-radius: 100% 100% 0 0;
      animation: wave4Move 12s infinite ease-in-out;
      transform: translateX(-75%);
      z-index: 4;
    }

    @keyframes wave4Move {
      0% {
        transform: translateX(-75%) translateY(0);
      }
      50% {
        transform: translateX(-70%) translateY(15px);
      }
      100% {
        transform: translateX(-75%) translateY(0);
      }
    }

    .content-container {
      position: relative;
      max-width: 1200px;
      margin: 0 35px;
      padding: 1rem;
      margin-top: 10vh;
      animation: fadeDown 1.2s ease forwards;
      opacity: 0;
      transform: translateY(-20px);
      z-index: 5;
    }

    @keyframes fadeDown {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .content-container h1 {
        font-size: 3.3rem;
        margin-bottom: 1rem;
        color: #fff;
    }

    .content-container h2 {
      font-size: 2.6rem;
      margin: 2rem 0 1rem;
      text-shadow: 1px 1px 4px rgba(0,0,0,0.4);
      color: #fff;
    }

    .content-container p {
      line-height: 1.7;
      margin-bottom: 1.2rem;
      font-size: 2.2rem;
      color: #fff;
    }

    .content-container strong {
      font-weight: 700;
      font-size: 22px;
    }
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
                <h1>Introducing TurboSilent BLDC Technology: Unleashing Unmatched Power and Efficiency</h1>
                <p>
                At Haneri, we redefine engineering excellence with our proprietary
                <strong>TurboSilent BLDC Technology</strong>. This advanced motor design not only delivers
                higher torque and exceptional durability but also ensures unmatched energy efficiency,
                setting a new benchmark for ceiling fan performance and contributing to a greener environment.
                </p>
                <p class="mb-2">
                <h2>What is TurboSilent BLDC Technology?</h2>
                <p>
                <strong>TurboSilent BLDC (Brushless Direct Current) Technology</strong> is an in-house developed
                motor system that employs high-tech electromagnetic and mechanical design principles. This
                cutting-edge innovation enhances torque delivery, minimizes energy losses, and ensures extended
                motor lifespan. TurboSilent motors are engineered to outperform conventional systems, offering
                industry-leading reliability and precision that you can trust.
                </p>
            </div>
        </div>
    </div><!-- End .row -->
</div><!-- End .container -->
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