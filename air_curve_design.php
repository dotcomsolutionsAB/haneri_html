<?php include("header.php"); ?>

<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <!-- <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Air Curve Design</li>
            </ol>
        </div> -->
    </nav>
    <!-- <div class="page-header pt-3 bg-transparent"> -->
    <div class="heading">
    <div class="button-group container" style="display: flex; gap: 10px; align-items: center;">
    <a class="btn button" href="/air_curve_design.php">Air Curve Design</a>
    <span class="divider">|</span>
    <a class="btn button" href="/turbosilent_bldc.php">TurboSilent BLDC</a>
    <span class="divider">|</span>
    <a class="btn button" href="/mass.php">H.A.S.S</a>
    <span class="divider">|</span>
    <a class="btn button" href="/lumiambience.php">Lumiambience</a>
    <span class="divider">|</span>
    <a class="btn button" href="/scan.php">S.C.A.N</a>
</div><!-- End .page-header -->
    <div class="container">                
        <section id="air_curve_design" class="air_curve_design">
            <?php include("inc_files/pillar_technology/air_curve_design.php"); ?>
        </section>
    </div>
</main><!-- End .main -->

<?php include("footer.php"); ?>