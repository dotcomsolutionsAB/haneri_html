<?php include("header.php"); ?>

<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Our Brands</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <div class="containe text-left">
        <h1 class="text-uppercase page_heading heading1">OUR BRANDS</h1>
    </div>
    <div class="container">    
        <section id="our-brands" class="brands-section">
            <?php include("inc_files/about/our-brands.php"); ?>
        </section>
    </div>

</main><!-- End .main -->

<?php include("footer.php"); ?>