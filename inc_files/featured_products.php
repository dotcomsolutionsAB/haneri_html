<section class="featured">
    <h2 class="heading_1">Featured Products</h2>

    <div class="featured-products-carousel owl-carousel owl-theme">
        <!-- Product 1 -->
        <div class="card">
            <div class="card_image">
                <img src="images/Moonlit_White.png" alt="Product 1" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹1049.000</p>
            <a href="https://haneri.ongoingsites.xyz/shop.php" class="btn rounded-pill bgremoved  px-4">Know More</a>
        </div>

        <!-- Product 2 -->
        <div class="card">
            <div class="card_image">
                <img src="images/Natura_Pine.png" alt="Product 2" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹1049.00</p>
            <a href="https://haneri.ongoingsites.xyz/shop.php" class="btn rounded-pill bgremoved  px-4">Know More</a>
        </div>

        <!-- Product 3 -->
        <div class="card">
            <div class="card_image">    
                <img src="images/Velvet_Black.png" alt="Product 3" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹1049.00</p>
            <a href="https://haneri.ongoingsites.xyz/shop.php" class="btn rounded-pill bgremoved  px-4">Know More</a>
        </div>

        <!-- Product 4 -->
        <div class="card">
            <div class="card_image">
                <img src="images/Espresso_Walnut.png" alt="Product 4" class="img-fluid">
            </div>
            <h4 class="heading2">Haneri Fengshui <span>Ceiling Fan</span></h4>
            <p class="product-price">MRP ₹1049.00</p>
            <a href="https://haneri.ongoingsites.xyz/shop.php" class="btn rounded-pill bgremoved  px-4">Know More</a>
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


<!-- <script>
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
</script> -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const token = localStorage.getItem("auth_token");
        const carousel = document.querySelector(".featured-products-carousel");

        if (!token || !carousel) return;

        fetch("{{base_url}}/products/get_products", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Authorization: `Bearer ${token}`
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && Array.isArray(data.data)) {
                const product = data.data.find(p => p.id === 14);

                if (!product || !product.variants || product.variants.length === 0) return;

                // Clear current carousel content
                carousel.innerHTML = "";

                product.variants.forEach(variant => {
                    // Try to match image based on variant_value (e.g., "Moonlit White" => "Moonlit_White.png")
                    let imageFileName = variant.variant_value.replace(/\s+/g, "_") + ".png";
                    let imageUrl = "images/" + imageFileName;

                    const card = document.createElement("div");
                    card.className = "card";

                    card.innerHTML = `
                        <div class="card_image">
                            <img src="${imageUrl}" alt="${variant.variant_value}" class="img-fluid">
                        </div>
                        <h4 class="heading2">${product.brand.name} ${product.name} <span>${product.category.name}</span></h4>
                        <p class="product-price">MRP ₹${parseFloat(variant.selling_price).toFixed(2)}</p>
                        <a href="https://haneri.ongoingsites.xyz/shop.php?product=${product.slug}&variant=${variant.id}" class="btn rounded-pill bgremoved px-4">Know More</a>
                    `;

                    carousel.appendChild(card);
                });

                // Re-initialize Owl Carousel after content is dynamically loaded
                $(".featured-products-carousel").owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: { items: 1 },
                        600: { items: 2 },
                        1000: { items: 4 }
                    }
                });
            }
        })
        .catch(err => {
            console.error("Error loading featured products:", err);
        });
    });
</script>
