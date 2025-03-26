<?php include("header.php"); ?>

<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Pillar Technology</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">M.A.S.S®</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <div class="containe text-left">
    <a  class="btn button" href="/air_curve_design.php">Air Curve Design</a>
            <a class="btn button" href="/turbosilent_bldc.php">TurboSilent BLDC</a>
            <a class="btn button" href="/mass.php">M.A.S.S</a>
            <a class="btn button" href="/lumiambience.php">Lumiambience</a>
            <a class="btn button" href="/scan.php">S.C.A.N</a>
    </div>
    <div class="container">                        
        <section id="mass" class="mass">
            <?php include("inc_files/pillar_technology/mass_tech.php"); ?>
        </section>
    </div>
</main><!-- End .main -->

<?php include("footer.php"); ?>