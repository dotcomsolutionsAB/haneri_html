
<style>
        .section-title {
            font-size: 28px;
            font-weight: bold;
        }

        .featured-products-carousel .card {
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .featured-products-carousel img {
            max-height: 180px;
            object-fit: contain;
            margin-bottom: 15px;
        }

        .btn-light {
            background-color: #f1f1f1;
            border: none;
            transition: 0.3s;
        }

        .btn-light:hover {
            background-color: #ddd;
        }

        .owl-nav {
            text-align: center;
            margin-top: 10px;
        }

        .owl-prev-btn, .owl-next-btn {
            font-size: 28px;
            color: #333;
            padding: 10px 18px;
            border-radius: 50%;
            background: #eee;
            margin: 0 10px;
            transition: 0.3s ease;
            display: inline-block;
        }

        .owl-prev-btn:hover, .owl-next-btn:hover {
            background: #ccc;
        }
        .owl-carousel {
            background: #f8f8f8;
        }

        .owl-carousel .card {
            min-height: 350px;
        }

    </style>
<section class="container py-5">
    <h2 class="section-title ls-n-15 text-center pt-2 mb-4">Featured Products</h2>

    <div class="featured-products-carousel owl-carousel owl-theme">
        <!-- Product 1 -->
        <div class="card">
            <img src="images/f1.png" alt="Product 1" class="img-fluid">
            <h6 class="text-truncate px-2">Crompton Silent Pro Blossom Smart Ceiling Fan</h6>
            <p class="text-primary fw-bold mb-3">MRP ₹16,999.00</p>
            <a href="#" class="btn btn-light rounded-pill px-4">Know More</a>
        </div>

        <!-- Product 2 -->
        <div class="card">
            <img src="images/f2.png" alt="Product 2" class="img-fluid">
            <h6 class="text-truncate px-2">Crompton Silent Pro Blossom Smart Ceiling Fan</h6>
            <p class="text-primary fw-bold mb-3">MRP ₹16,999.00</p>
            <a href="#" class="btn btn-light rounded-pill px-4">Know More</a>
        </div>

        <!-- Product 3 -->
        <div class="card">
            <img src="images/f3.png" alt="Product 3" class="img-fluid">
            <h6 class="text-truncate px-2">Crompton Silent Pro Blossom Smart Ceiling Fan</h6>
            <p class="text-primary fw-bold mb-3">MRP ₹16,999.00</p>
            <a href="#" class="btn btn-light rounded-pill px-4">Know More</a>
        </div>

        <!-- Product 4 -->
        <div class="card">
            <img src="images/f4.png" alt="Product 4" class="img-fluid">
            <h6 class="text-truncate px-2">Crompton Silent Pro Blossom Smart Ceiling Fan</h6>
            <p class="text-primary fw-bold mb-3">MRP ₹16,999.00</p>
            <a href="#" class="btn btn-light rounded-pill px-4">Know More</a>
        </div>

        <!-- Product 5 -->
        <div class="card">
            <img src="images/f5.png" alt="Product 5" class="img-fluid">
            <h6 class="text-truncate px-2">Crompton Silent Pro Blossom Smart Ceiling Fan</h6>
            <p class="text-primary fw-bold mb-3">MRP ₹16,999.00</p>
            <a href="#" class="btn btn-light rounded-pill px-4">Know More</a>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $('.featured-products-carousel').owlCarousel({
        loop: false,
        margin: 20,
        nav: true,
        dots: false,
        items: 4,
        slideBy: 2,
        navText: [
            '<span class="owl-prev-btn">‹</span>',
            '<span class="owl-next-btn">›</span>'
        ],
        responsive: {
            0: { items: 1, slideBy: 1 },
            576: { items: 2, slideBy: 2 },
            768: { items: 3, slideBy: 2 },
            992: { items: 4, slideBy: 2 }
        }
        });
    });
</script>