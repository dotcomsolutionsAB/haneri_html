<?php include("configs/config.php"); ?>

<section class="featured">
    <h2 class="heading_1">Featured Products</h2>

    <div class="featured-products-carousel owl-carousel owl-theme">
        <!-- Product cards will be injected here -->
    </div>
</section>

<style>
    .featured-products-carousel .card {
        padding: 15px;
        border: 1px solid #eee;
        border-radius: 10px;
        background-color: #fff;
        text-align: center;
        margin: 10px;
    }

    .featured-products-carousel .card img {
        max-height: 200px;
        object-fit: contain;
        margin-bottom: 10px;
    }

    .featured-products-carousel .owl-nav {
        position: absolute;
        top: -40px;
        right: 0;
    }

    .featured-products-carousel .owl-nav span {
        font-size: 30px;
        color: #333;
        cursor: pointer;
        margin: 0 5px;
    }

    @media (max-width: 768px) {
        .featured-products-carousel .card img {
            max-height: 150px;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const token = localStorage.getItem("auth_token");
        const carousel = document.querySelector(".featured-products-carousel");

        if (!token || !carousel) return;

        fetch("<?php echo BASE_URL; ?>/products/get_products", {
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

                carousel.innerHTML = "";

                product.variants.forEach(variant => {
                    let imageFileName = variant.variant_value.replace(/\s+/g, "_") + ".png";
                    let imageUrl = "images/" + imageFileName;

                    const card = document.createElement("div");
                    card.className = "card item"; // 'item' class is important for Owl Carousel

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

                // Initialize Owl Carousel AFTER content is added
                $('.featured-products-carousel').owlCarousel({
                    loop: false,
                    margin: 20,
                    nav: true,
                    dots: false,
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
            }
        })
        .catch(err => {
            console.error("Error loading featured products:", err);
        });
    });
</script>
