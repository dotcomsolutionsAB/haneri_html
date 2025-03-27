<?php include("header.php"); ?>
<?php include("configs/config.php"); ?>
<main class="main about">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="https://haneri.ongoingsites.xyz/domex">Pillar Technology</a></li> -->
                <li class="breadcrumb-item active" aria-current="page">Domex</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <div class="page-wrapper">

        <main class="main">

        <section class="container">
    <h2 class="section-title ls-n-15 text-center pt-2 m-b-4">Featured Products</h2>

    <div class="featured-products-carousel owl-carousel owl-theme">
        <!-- Product 1 -->
        <div class="card text-center p-3 border-0 shadow-sm rounded-4">
            <img src="images/f1.png" alt="Product 1" class="img-fluid mb-3" style="max-height: 180px; object-fit: contain;">
            <h6 class="text-truncate px-2">Crompton Silent Pro Blossom Smart Ceiling Fan</h6>
            <p class="text-primary fw-bold mb-3">MRP ₹16,999.00</p>
            <a href="#" class="btn btn-light rounded-pill px-4">Know More</a>
        </div>

        <!-- Product 2 -->
        <div class="card text-center p-3 border-0 shadow-sm rounded-4">
            <img src="images/f2.png" alt="Product 2" class="img-fluid mb-3" style="max-height: 180px; object-fit: contain;">
            <h6 class="text-truncate px-2">Crompton Silent Pro Blossom Smart Ceiling Fan</h6>
            <p class="text-primary fw-bold mb-3">MRP ₹16,999.00</p>
            <a href="#" class="btn btn-light rounded-pill px-4">Know More</a>
        </div>

        <!-- Product 3 -->
        <div class="card text-center p-3 border-0 shadow-sm rounded-4">
            <img src="images/f3.png" alt="Product 3" class="img-fluid mb-3" style="max-height: 180px; object-fit: contain;">
            <h6 class="text-truncate px-2">Crompton Silent Pro Blossom Smart Ceiling Fan</h6>
            <p class="text-primary fw-bold mb-3">MRP ₹16,999.00</p>
            <a href="#" class="btn btn-light rounded-pill px-4">Know More</a>
        </div>

        <!-- Product 4 -->
        <div class="card text-center p-3 border-0 shadow-sm rounded-4">
            <img src="images/f4.png" alt="Product 4" class="img-fluid mb-3" style="max-height: 180px; object-fit: contain;">
            <h6 class="text-truncate px-2">Crompton Silent Pro Blossom Smart Ceiling Fan</h6>
            <p class="text-primary fw-bold mb-3">MRP ₹16,999.00</p>
            <a href="#" class="btn btn-light rounded-pill px-4">Know More</a>
        </div>

        <!-- Product 5 -->
        <div class="card text-center p-3 border-0 shadow-sm rounded-4">
            <img src="images/f5.png" alt="Product 5" class="img-fluid mb-3" style="max-height: 180px; object-fit: contain;">
            <h6 class="text-truncate px-2">Crompton Silent Pro Blossom Smart Ceiling Fan</h6>
            <p class="text-primary fw-bold mb-3">MRP ₹16,999.00</p>
            <a href="#" class="btn btn-light rounded-pill px-4">Know More</a>
        </div>
    </div>
</section>
<style>
    .card.rounded-4 {
        border-radius: 20px;
    }
    .owl-carousel .card {
        height: 100%;
    }
</style>
<script>
    $('.featured-products-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        responsive: {
            0: { items: 1 },
            576: { items: 2 },
            768: { items: 3 },
            992: { items: 4 },
            1200: { items: 5 }
        }
    });
</script>

        </main>

            <!-- End .main -->
        <?php include("footer.php"); ?>
        <!-- End .footer -->
    </div><!-- End .page-wrapper -->
</main><!-- End .main -->