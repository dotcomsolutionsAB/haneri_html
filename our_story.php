<?php include("header.php"); ?>

<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Our Story</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <!-- <div class="page-header pt-3 bg-transparent"> -->
    <div class="heading">
        <div class="containe text-left">
            <h1 class="text-uppercase text-left page_heading heading1">OUR STORY</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <div class="container">       
        <section id="our-story" class="our_story">
            <?php include("inc_files/about/our_story_section.php"); ?>
        </section>
    </div>

</main><!-- End .main -->

<?php include("footer.php"); ?>