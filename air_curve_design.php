<?php include("header.php"); ?>

<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Pillar Technology</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Air Curve Design</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <!-- <div class="page-header pt-3 bg-transparent"> -->
    <div class="heading">
        <div class="containe text-left">
            <button class="">Air Curve Design</button>
            <button class="">TurboSilent BLDC</button>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <div class="container">                
        <section id="air_curve_design" class="air_curve_design">
            <?php include("inc_files/pillar_technology/air_curve_design.php"); ?>
        </section>
    </div>
</main><!-- End .main -->

<?php include("footer.php"); ?>