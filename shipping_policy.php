<?php include("header.php"); ?>

<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="#">Pillar Technology</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Shipping Policy</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">                
        <div id="shipping_policy" class="shipping_policy">
            <?php include("inc_files/policy/shipping_policy.php"); ?>
        </div>
    </div>
</main><!-- End .main -->

<?php include("footer.php"); ?>