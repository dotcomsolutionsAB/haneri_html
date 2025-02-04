<?php include("header.php"); ?>

<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Capabilities</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="containe text-left">
        <h1 class="font4 text-uppercase about_section">CAPABILITIES</h1>
    </div>
    <div class="container">                
        
        <section id="capabilities" class="capabilities-section">
            <?php include("inc_files/about/capabilities_section.php"); ?>
        </section>
    </div>

</main><!-- End .main -->

<?php include("footer.php"); ?>