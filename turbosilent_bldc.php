<?php include("header.php"); ?>

<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Turbosilent BLDC</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <!-- <div class="page-header pt-3 bg-transparent"> -->
    <div class="heading">
        <div class="containe text-left">
        <a  class="btn button" href="/air_curve_design.php">Air Curve Design</a>
            <a class="btn button" href="/turbosilent_bldc.php">TurboSilent BLDC</a>
            <a class="btn button" href="/mass.php">M.A.S.S</a>
            <a class="btn button" href="/lumiambience.php">Lumiambience</a>
            <a class="btn button" href="/scan.php">S.C.A.N</a>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="content-container">
        <h2 class="heading2 primary">Introducing TurboSilent BLDC Technology: Unleashing Unmatched Power and Efficiency</h2>
        <p class="paragraph1 light">
        At Haneri, we redefine engineering excellence with our proprietary
        <span class="highlight_p">TurboSilent BLDC Technology</span>. This advanced motor design not only delivers
        higher torque and exceptional durability but also ensures unmatched energy efficiency,
        setting a new benchmark for ceiling fan performance and contributing to a greener environment.
        </p>
        <p class="mb-2">
        <h2 class="heading2 primary" >What is TurboSilent BLDC Technology?</h2>
        <p class="paragraph1">
        <span class="highlight_p">TurboSilent BLDC (Brushless Direct Current) Technology</span> is an in-house developed
        motor system that employs high-tech electromagnetic and mechanical design principles. This
        cutting-edge innovation enhances torque delivery, minimizes energy losses, and ensures extended
        motor lifespan. TurboSilent motors are engineered to outperform conventional systems, offering
        industry-leading reliability and precision that you can trust.
        </p>
    </div>
    
    <style>
        
    </style>
    <div class="container">                            
        <section id="turbosilent_bldc" class="turbosilent_bldc">
            <?php include("inc_files/pillar_technology/turbosilent_bldc.php"); ?>
        </section>
    </div>
</main><!-- End .main -->

<?php include("footer.php"); ?>