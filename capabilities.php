<?php include("header.php"); ?>

<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <!-- <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Capabilities</li>
            </ol>
        </div> -->
    </nav>

    <div class="button-group container" style="display: flex; gap: 10px; align-items: center;">
    <a class="btn button" href="/our_story.php">Our Story</a>
    <span class="divider">|</span>
    <a class="btn button" href="/our_brands.php">Our Brands</a>
    <span class="divider">|</span>
    <a class="btn button" href="/capabilities.php">Capabilities</a>
    </div>
    <div class="container">                
        
        <section id="capabilities" class="capabilities-section">
            <?php include("inc_files/about/capabilities_section.php"); ?>
        </section>
    </div>

</main><!-- End .main -->

<?php include("footer.php"); ?>