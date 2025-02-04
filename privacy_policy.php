<?php include("header.php"); ?>

<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Pillar Technology</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Privary Policy</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="heading">
        <div class="containe text-left">
            <h1 class="text-uppercase text-left about_section">Privacy Policy</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <div class="container">                
        <div id="privacy_policy" class="privacy_policy">
            <?php include("inc_files/policy/privacy_policy.php"); ?>
        </div>
    </div>
</main><!-- End .main -->

<?php include("footer.php"); ?>