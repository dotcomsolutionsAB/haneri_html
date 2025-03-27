

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