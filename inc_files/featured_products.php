<section class="featured">
    <h2 class="heading_1">Featured Products</h2>

    <div class="featured-products-carousel owl-carousel owl-theme">
        <!-- Product 1 -->
        <div class="card">
            <div class="card_image">
                <img src="images/Moonlit_White.png" alt="Product 1" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹16,999.00</p>
            <a href="#" class="btn rounded-pill bgremoved  px-4">Know More</a>
        </div>

        <!-- Product 2 -->
        <div class="card">
            <div class="card_image">
                <img src="images/Natura_Pine.png" alt="Product 2" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹16,999.00</p>
            <a href="#" class="btn rounded-pill bgremoved  px-4">Know More</a>
        </div>

        <!-- Product 3 -->
        <div class="card">
            <div class="card_image">    
                <img src="images/Velvet_Black.png" alt="Product 3" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹16,999.00</p>
            <a href="#" class="btn rounded-pill bgremoved  px-4">Know More</a>
        </div>

        <!-- Product 4 -->
        <div class="card">
            <div class="card_image">
                <img src="images/Espresso_Walnut.png" alt="Product 4" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹16,999.00</p>
            <a href="#" class="btn rounded-pill bgremoved  px-4">Know More</a>
        </div>

        <!-- Product 5 -->
        <div class="card">
            <div class="card_image">
                <img src="images/Velvet_Black.png" alt="Product 5" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹16,999.00</p>
            <a href="#" class="btn bgremoved rounded-pill bgremoved  px-4">Know More</a>
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