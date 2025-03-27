<section class="container featured">
    <h2 class="heading_1">Featured Products</h2>

    <div class="featured-products-carousel owl-carousel owl-theme">
        <!-- Product 1 -->
        <div class="card">
            <div class="card_image">
                <img src="images/Moonlit_White.png" alt="Product 1" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹16,999.00</p>
            <a href="#" class="btn rounded-pill px-4">Know More</a>
        </div>

        <!-- Product 2 -->
        <div class="card">
            <div class="card_image">
                <img src="images/Natura_Pine.png" alt="Product 2" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹16,999.00</p>
            <a href="#" class="btn rounded-pill px-4">Know More</a>
        </div>

        <!-- Product 3 -->
        <div class="card">
            <div class="card_image">    
                <img src="images/Velvet_Black.png" alt="Product 3" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹16,999.00</p>
            <a href="#" class="btn rounded-pill px-4">Know More</a>
        </div>

        <!-- Product 4 -->
        <div class="card">
            <div class="card_image">
                <img src="images/Espresso_Walnut.png" alt="Product 4" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹16,999.00</p>
            <a href="#" class="btn rounded-pill px-4">Know More</a>
        </div>

        <!-- Product 5 -->
        <div class="card">
            <div class="card_image">
                <img src="images/Velvet_Black.png" alt="Product 5" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹16,999.00</p>
            <a href="#" class="btn bgremoved rounded-pill px-4">Know More</a>
        </div>
    </div>
</section>


<style>
    .card_image{
        height: 240px;
        /* background: antiquewhite; */
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .featured-products-carousel .card:hover {
        /* box-shadow: 5px 5px 3px 0px darkgreen; */
    }

    .featured-products-carousel .card {
        border-radius: 20px;
        padding: 20px;
        text-align: justify;
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
        width: 150px;
        border-radius: 50px;
    }

    .btn-light:hover {
        background: linear-gradient(to left, rgb(49 88 88), rgb(15 164 167) 0%, rgb(4, 189, 193) 50%, rgb(49 88 88));
        transition: 0.25s ease-in !important;
    }
    .btn-light:hover {
        color: #f3f6f9 !important;
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
        background: #f8f8f800;
    }

    .owl-carousel .card {
        min-height: 400px;
        background: radial-gradient(#ecf6f6d1, #00473e3d);
        margin-top: 10px;
    }
    .fetured-next{
        display:none !important;
    }

</style>
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
            '<span class="owl-prev-btn fetured-next">‹</span>',
            '<span class="owl-next-btn fetured-next">›</span>'
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